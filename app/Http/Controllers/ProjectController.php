<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Project;
use App\Template;
use App\User;
use App\Issue;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->paginate(config('app.paginate'));
        if (auth()->user()->isAdmin()) {
            $projects = Project::with('users')->paginate(config('app.paginate'));
        }
        $data = [
            'projects' => $projects,
        ];
        return view('projects.index', $data);
    }

    public function create()
    {
        $this->middleware(CheckAdmin::class);
        $users = User::all();
        $data = [
            'users' => $users,
            'statuses' => Project::STATUS,
        ];
        return view('projects.create', $data);
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());
        if($request->user_ids) {
            foreach ($request->user_ids as $userId) {
                User::find($userId)->projects()->save($project);
            }
        }
        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = Project::find($id);
        $tasks = $project->tasks;
        $data = [
            'project' => $project,
            'tasks' => $tasks
        ];
        return view('projects.show', $data);
    }

    public function edit($id)
    {
        $users = User::all();
        $project = Project::find($id);
        $data = [
            'project' => $project,
            'users' => $users,
            'statuses' => Project::STATUS,
        ];
        return view('projects.edit', $data);
    }

    public function update($id, Request $request)
    {
        $project = Project::find($id);
        foreach ($project->user_ids as $userId) {
            $user = User::find($userId);
            $projectId = array_diff($user->project_ids, [$id]);
            $user->update([
                'project_ids' => $projectId,
            ]);
        }
        $project->update($request->all());
        foreach ($request->user_ids as $userId) {
            User::find($userId)->projects()->save($project);
        }
        return redirect()->route('projects.index');
    }

    public function board($id)
    {
        $project = Project::with('tasks.issues')->find($id);
        $data = [
            'project' => $project,
        ];
        return view('projects.task.board', $data);
    }
    public function tasks($id)
    {
        $project = Project::with('tasks.users')->find($id);
        $tasks = $project->tasks()->paginate(config('app.paginate'));
        $data = [
            'project' => $project,
            'tasks' => $tasks,
        ];
        return view('projects.task.index', $data);
    }

    public function taskEdit($id, $taskId)
    {
        $project = Project::find($id);
        $templates = Template::all();
        $task = Task::find($taskId);
        $data = [
            'templates' => $templates,
            'project' => $project,
            'statuses' => Task::STATUS,
            'priorities' => Task::PRIORITY,
            'task' => $task,
        ];
        return view('projects.task.edit', $data);
    }

    public function taskUpdate($id, $taskId, Request $request)
    {
       
        $data = $request->all();
        $data['project_id'] = $id;
        $data['user_ids'] = $request->work_user_ids['id'];

        $task = Task::find($taskId);
        
        if ($data['user_ids'] != $task->user_ids) {
            $oldUser = '';
            foreach($task->users as $user) {
                $oldUser .= " $user->name";
            };
            $newUser = '';
            if (!empty($data['user_ids'])) {
                foreach($data['user_ids'] as $userId) {
                    $user = User::find($userId);
                    $newUser .= " $user->name";
                };
            }
            $project = Project::find($id);
            
            $dataRisk = [
                'title' => "Thay đổi người thực hiện trong công việc $task->name",
                'desc' => "Thay đổi người thực hiện task có thể dẫn đến việc phải đào tạo lại nhân lực từ đầu hoặc trì hoãn công việc",
                'task_id' => $task->id,
                'status' => 1,
                'feature' => 3,
                'type' => 3,
                'danger' => 2,
                'priority' => 3,
                'detected_user' => 0,
                'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                'approved_user' => $project->leader_id,
                'user_id' => $project->leader_id,
                'deadline' => date("Y-m-d", strtotime('tomorrow')),
                'created_by' => auth()->id(),
                'created_at' => date("Y-m-d", strtotime('today')),
            ];
            $taskRisk = $task->risks;
            if (empty($taskRisk)) {
                $taskRisk = [$dataRisk];
            } else {
                $taskRisk[array_key_last($taskRisk) + 1] = $dataRisk;
            }
            $task->risks = $taskRisk;
            $task->save();
        }
        foreach ($task->user_ids as $userId) {
            
            $user = User::find($userId);
            $projectId = array_diff($user->project_ids, [$id]);
            $user->update([
                'task_ids' => $projectId,
            ]);
        }
        
        $task->update($data);
        
        foreach ($data['user_ids'] as $userId) {
            $userUpdate = User::find($userId);
            if (!empty($userUpdate->task_ids)) {
                $userUpdate->task_ids += (array) $task->id;
            } else {
                $userUpdate->task_ids = [$task->id];
            }
            $userUpdate->save();
        }
        return redirect()->route('projects.tasks.index', $id);
    }

    public function taskCreate($id)
    {
        $project = Project::find($id);
        $templates = Template::all();
        $data = [
            'templates' => $templates,
            'project' => $project,
            'statuses' => Task::STATUS,
            'priorities' => Task::PRIORITY,
        ];
        return view('tasks.create', $data);
    }

    public function taskShow($id, $taskId)
    {
        $project = Project::find($id);
        $task = Task::find($taskId);
        $users = User::all();
        $data = [
            'users' => $users,
            'project' => $project,
            'task' => $task,
            'statuses' => Task::STATUS,
            'priorities' => Task::PRIORITY,
            'percents' => Task::PERCENT,
        ];
        return view('projects.task.detail', $data);
    }

    public function taskStore(Request $request, $id)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        $data['user_ids'] = $request->work_user_ids['id'];
        $task = Task::create($data);
        foreach ($data['user_ids'] as $userId) {
            if($userId) {
                User::find($userId)->tasks()->save($task);
            }
        }
        $project = Project::find($id);
        $risks = $task->getRisks();
        $taskRisk = $task->risks;
        if ($risks['excess_cash']) {
            $dataRisk = [
                'title' => "Thừa chi phí tại công việc $task->name",
                'desc' => "Phân bố thừa " . $risks['excess_cash'] . " VND cho công việc $task->name",
                'task_id' => $task->id,
                'status' => 1,
                'feature' => 3,
                'type' => 4,
                'danger' => 3,
                'priority' => 3,
                'detected_user' => 0,
                'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                'approved_user' => $project->leader_id,
                'user_id' => $project->leader_id,
                'deadline' => date("Y-m-d", strtotime('tomorrow')),
                'created_by' => auth()->id(),
                'created_at' => date("Y-m-d", strtotime('today')),
            ];
            if (empty($taskRisk)) {
                $taskRisk = [$dataRisk];
            } else {
                $taskRisk[array_key_last($taskRisk) + 1] = $dataRisk;
            }

        }

        if ($risks['time']) {
            $dataRisk = [
                'title' => "Thừa nhân lực hoặc thiếu thời gian tại công việc $task->name",
                'desc' => "Phân bố thừa nhân lực trong" . $risks['time'] . " giờ hoặc thiếu thời gian làm việc trong " . $risks['time'] . " tại công việc $task->name",
                'task_id' => $task->id,
                'status' => 1,
                'feature' => 3,
                'type' => 4,
                'danger' => 3,
                'priority' => 4,
                'detected_user' => 0,
                'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                'approved_user' => $project->leader_id,
                'user_id' => $project->leader_id,
                'deadline' => date("Y-m-d", strtotime('tomorrow')),
                'created_by' => auth()->id(),
                'created_at' => date("Y-m-d", strtotime('today')),
            ];
            if (empty($taskRisk)) {
                $taskRisk = [$dataRisk];
            } else {
                $taskRisk[array_key_last($taskRisk) + 1] = $dataRisk;
            }
        }

        if ($risks['resource']) {
            $dataRisk = [
                'title' => "Thừa thời gian hoặc thiếu nhân lực tại công việc $task->name",
                'desc' => "Phân bố thừa thời gian trong " . $risks['resource'] . " giờ hoặc thiếu nhân lực làm việc trong " . $risks['resource'] . " giờ tại công việc $task->name",
                'task_id' => $task->id,
                'status' => 1,
                'feature' => 3,
                'type' => 4,
                'danger' => 3,
                'priority' => 4,
                'detected_user' => 0,
                'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                'approved_user' => $project->leader_id,
                'user_id' => $project->leader_id,
                'deadline' => date("Y-m-d", strtotime('tomorrow')),
                'created_by' => auth()->id(),
                'created_at' => date("Y-m-d", strtotime('today')),
            ];
            if (empty($taskRisk)) {
                $taskRisk = [$dataRisk];
            } else {
                $taskRisk[array_key_last($taskRisk) + 1] = $dataRisk;
            }
        }

        if ($risks['cost']) {
            $dataRisk = [
                'title' => "Thiếu chi phí tại công việc $task->name",
                'desc' => "Phân bố thiếu ". $risks['cost'] ." VND cho công việc $task->name",
                'task_id' => $task->id,
                'status' => 1,
                'feature' => 3,
                'type' => 4,
                'danger' => 3,
                'priority' => 3,
                'detected_user' => 0,
                'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                'approved_user' => $project->leader_id,
                'user_id' => $project->leader_id,
                'deadline' => date("Y-m-d", strtotime('tomorrow')),
                'created_by' => auth()->id(),
                'created_at' => date("Y-m-d", strtotime('today')),
            ];
            if (empty($taskRisk)) {
                $taskRisk = [$dataRisk];
            } else {
                $taskRisk[array_key_last($taskRisk) + 1] = $dataRisk;
            }
        }
        $task->risks = $taskRisk;
        $task->save();
        return redirect()->route('projects.tasks.index', $id);
    }

    public function indexRisk($id) {
        $project = Project::find($id);
        $data = [
            'project' => $project,
        ];
        return view('projects.task.risk', $data);
    }
}
