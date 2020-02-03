<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Task;
use App\Template;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Connection;

class TaskController extends Controller
{
    public function createIssue($taskId, Request $request)
    {
        $task = Task::find($taskId);
        $templates = Template::all();
        $data = [
            'task' => $task,
            'templates' => $templates,
            'statuses' => Issue::STATUS,
            'types' => Issue::TYPE,
            'priorities' => Issue::PRIORITY,
            'users' => User::all(),
            'percents' => Issue::PERCENT,
        ];
        if ($request->ajax()) {
            return view('issues.ajax-create', $data)->render();
        }
        return view('issues.create', $data);
    }

    public function createChildIssue($taskId, $issueParentId)
    {
        $task = Task::find($taskId);
        $templates = Template::all();
        $data = [
            'task' => $task,
            'templates' => $templates,
            'statuses' => Issue::STATUS,
            'types' => Issue::TYPE,
            'priorities' => Issue::PRIORITY,
            'percents' => Issue::PERCENT,
        ];
        if ($issueParentId) {
            $issueParent = Issue::find($issueParentId);
            $data['issueParent'] = $issueParent;
        }
        return view('issues.create', $data);
    }

    public function updateRisk($id, Request $request)
    {
        $task = Task::find($id);
        $risks = $task->risks;
        if (!empty($request->defend)) {
            $risks[$request->key]['defend'][] = $request->defend;
            $task->risks = $risks;
            $task->save();
            return redirect()->route('tasks.risks.detail', [$task->id, $request->key]);
        }
        $risks[$request->key]['status'] = $request->status;
        if($request->user_id) {
            $risks[$request->key]['user_id'] = $request->user_id;
        }
        $task->risks = $risks;
        $task->save();
        if($request->status == 1) {
            return redirect()->route('projects.tasks.show', [$task->project_id, $task->id]);
        }

        if($request->status == 2) {
            return redirect()->route('projects.tasks.create', $task->project_id);
        }

        if($request->status == 3) {
            return redirect()->route('projects.tasks.show', [$task->project_id, $task->id]);
        }

        if($request->status == 4) {
            return redirect()->route('tasks.issues.create', $task->id);
        }
    }

    public function storeIssue($taskId, Request $request)
    {
        // Perform actions.
        if ($request->template_id) {
            $template = Template::findOrFail($request->template_id);
            $templateColumns = $template->columns;
            if ($request['columns']) {
                foreach($request['columns'] as $key => $value) {
                    $templateColumns[$key]['value'] = $value;
                }
            }
            $request['columns'] = $templateColumns;
        }
        if ($request->documentation) {
            $file = $request->documentation;
            $extension = substr($file->getClientOriginalName(), strrpos($file->getClientOriginalName(), '.'));
            $filename = uniqid() . $extension;
            $path = Issue::PATH;
            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $request['documentation'] = $filename;
        };
        $issue = Issue::create($request->all());
        $parentIssue = '';

        if (!empty($request->parent_issue_id)) {
            $parentIssue = Issue::find($request->parent_issue_id);

            if ($parentIssue) {
                $parentIssue->children_issue_ids = (array) $parentIssue->children_issue_ids + [$issue->id];
                $parentIssue->save();
            }
        }

        if (!empty($request->children_issue_ids)) {
            foreach($request->children_issue_ids as $childId) {
                $childIssue = Issue::find($childId);
                if ($childIssue) {
                    $childIssue->parent_issue_id = $issue->id;
                    $childIssue->save();
                }
            }
        }

        if (!empty($request->relative_issue_ids)) {
            foreach($request->relative_issue_ids as $relativeId) {
                $relativeIssue = Issue::find($relativeId);
                if ($relativeIssue) {
                    $a = $relativeIssue->relative_issue_ids;
                    $a[] = $issue->id;
                    $relativeIssue->relative_issue_ids = $a;
                    $relativeIssue->save();
                }
            }
        }

        if (!empty($request->similar_issue_ids)) {
            foreach($request->similar_issue_ids as $similarId) {
                $similarIssue = Issue::find($similarId);
                if ($similarId) {
                    $a = $similarIssue->similar_issue_ids;
                    $a[] = $issue->id;
                    $similarIssue->similar_issue_ids = $a;
                    $similarIssue->save();
                }
            }
        }

        if (!empty($request->required_issue_id)) {
            $requiredIssue = Issue::find($request->required_issue_id);
            if ($requiredIssue) {
                $a = $requiredIssue->subordinate_issue_ids;
                $a[] = $issue->id;
                $requiredIssue->subordinate_issue_ids = $a;
                $requiredIssue->save();
            }
        }

        if (!empty($request->subordinate_issue_ids)) {
            foreach($request->subordinate_issue_ids as $subordinateId) {
                $subordinateIssue = Issue::find($subordinateId);
                if ($subordinateIssue) {
                    $subordinateIssue->required_issue_id = $issue->id;
                    $subordinateIssue->save();
                }
            }
        }

        if (!empty($request->user_id)) {
            $user = User::find($request->user_id);
            $user->issue_ids = (array)$user->issue_ids + [$issue->id];
            $user->save();
        }
        $task = Task::find($taskId);
        $task->issue_ids = (array)$task->issue_ids + [$issue->id];
        $task->save();
        $project = $task->project;
        return redirect()->route('projects.tasks.show', [$project->id, $taskId]);
    }

    public function editIssue($taskId, $issueId)
    {
        $issue = Issue::find($issueId);
        $task = Task::find($taskId);
        $templates = Template::all();
        $users = User::all();
        $data = [
            'task' => $task,
            'templates' => $templates,
            'statuses' => Issue::STATUS,
            'types' => Issue::TYPE,
            'priorities' => Issue::PRIORITY,
            'percents' => Issue::PERCENT,
            'issue' => $issue,
            'users' => $users,
        ];
        return view('issues.edit', $data);
    }

    public function updateIssue($taskId, $issueId, Request $request)
    {
        if ($request->defend)
        {
            $issue = Issue::find($issueId);
            if (empty($issue->defend)) {
                $issue->defend = [$request->defend];
            } else {
                $issue->defend[] = $request->defend;
            }
            $issue->save();
            return redirect()->route('issues.detail', $issueId);
        }
        if ($request->template_id) {
            $template = Template::findOrFail($request->template_id);
            $templateColumns = $template->columns;
            if($request['columns']) {
                foreach($request['columns'] as $key => $value) {
                    $templateColumns[$key]['value'] = $value;
                }
            }
            $request['columns'] = $templateColumns;
        }
        if ($request->documentation) {
            $file = $request->documentation;
            $extension = substr($file->getClientOriginalName(), strrpos($file->getClientOriginalName(), '.'));
            $filename = uniqid() . $extension;
            $path = Issue::PATH;
            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $request['documentation'] = $filename;
        };
        $issue = Issue::find($issueId);
        if (is_array($request->children_issue_ids)) {
            $issue->updateChildIssues($request->children_issue_ids);
        }
        if (is_array($request->relative_issue_ids)) {
            $issue->updateRelativeIssues($request->relative_issue_ids);
        }
        if (is_array($request->similar_issue_ids)) {
            $issue->updateSimilarIssues($request->similar_issue_ids);
        }
        if (is_array($request->subordinate_issue_ids)) {
            $issue->updateSubordinateIssues($request->subordinate_issue_ids);
        }
        if ($request->parent_issue_id) {
            $issue->updateParentIssue($request->parent_issue_id);
        }
        $issue->update($request->all());



        if ($request->required_issue_id) {
            $requiredIssue = Issue::find($request->required_issue_id);
            if ($requiredIssue) {
                $requiredIssue->save([
                    'subordinate_issue_ids' => (array)$requiredIssue->subordinate_issue_ids + [$issue->id],
                ]);
            }
        }

        if ($request->user_id) {
            $user = User::find($request->user_id);
            if ($user) {
                $user->issue_ids += array_diff($user->issue_ids, [$issue->id]);
                $user->save();
            }
        }
        $task = Task::find($taskId);
        $task->issue_ids += array_diff((array)$task->issue_ids, [$issue->id]);
        $task->save();
        $project = $task->project;
        return redirect()->route('projects.tasks.show', [$project->id, $taskId]);
    }

    public function updateRelativeIssue($issueId, Request $request)
    {
        $issue = Issue::find($issueId);
        $issue->update($request->all());
        return redirect()->back();
    }

    public function deleteIssue($taskId, Request $request)
    {
        $issue = Issue::find($request->issue_id);
        $task = Task::find($taskId);
        $issueIds = array_diff((array)$task->issue_ids, [$request->issue_id]);
        $task->issue_ids = $issueIds;
        $task->save();

        if ($issue->parent_issue_id) {
            $parentIssue = Issue::find($issue->parent_issue_id);
            $parentIssue->removeChildId($request->issue_id);
        }

        if (!empty($issue->children_issue_ids)) {
            foreach($issue->children_issue_ids as $issueChildId) {
                $childIssue = Issue::find($issueChildId);
                $childIssue->removeParentId();
            }
        }

        if (!empty($issue->relative_issue_ids)) {
            foreach($issue->relative_issue_ids as $issueRelativeId) {
                $relativeIssue = Issue::find($issueRelativeId);
                $relativeIssue->removeRelativeId($request->issue_id);
            }
        }

        if (!empty($issue->similar_issue_ids)) {
            foreach($issue->similar_issue_ids as $issueSimilarId) {
                $similarIssue = Issue::find($issueSimilarId);
                $similarIssue->removeSimilarId($request->issue_id);
            }
        }

        if (!empty($issue->subordinate_issue_ids)) {
            foreach($issue->subordinate_issue_ids as $issueSimilarId) {
                $subordinateIssue = Issue::find($issueSimilarId);
                $subordinateIssue->removeRequiredId();
            }
        }

        if (!empty($issue->required_issue_id)) {
            $requiredIssue = Issue::find($issue->required_issue_id);
            $requiredIssue->removeSubordinateId($request->issue_id);
        }

        if (!empty($issue->user_id)) {
            $user = User::find($issue->user_id);
            $key = array_search($request->issue_id, $user->issue_ids);
            if ($key !== false) {
                $a = $user->issue_ids;
                unset($a[$key]);
                $user->issue_ids = $a;
                $user->save();
            }
            $user->save;
        }
        $issue->delete();
        $project = $task->project;
        return redirect()->route('projects.tasks.show', [$project->id, $taskId]);
    }

    public function createRisk($taskId, Request $request)
    {
        $task = Task::find($taskId);
        $data = [
            'task' => $task,
            'priorities' => Issue::RISK_PRIORITY,
            'types' => Issue::RISK_TYPE,
            'users' => User::all(),
            'dangers' => Issue::RISK_DANGER,
            'features' => Issue::RISK_FEATURE,
            'statuses' => Issue::RISK_STATUS,
        ];
        if ($request->ajax()) {
            return view('risks.ajax-create', $data)->render();
        }
        return view('risks.create', $data);
    }

    public function storeRisk($taskId, Request $request)
    {
        $task = Task::find($taskId);
        $data = $request->all();
        unset($data['_token']);
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = now();
        $risks = (array)$task->risks;
        $risks[] = $data;
        $task->risks = $risks;
        $task->save();
        $project = $task->project;
        return redirect()->route('projects.tasks.show', [$project->id, $taskId]);
    }

    public function detailRisk($taskId, $riskKey)
    {
        $task = Task::find($taskId);
        $data = [
            'task' => $task,
            'risk' => $task->risks[$riskKey],
            'statuses' => Issue::RISK_STATUS,
            'priorities' => Issue::RISK_PRIORITY,
            'riskKey' => $riskKey,
        ];
        return view('risks.detail', $data);
    }

    public function deleteRisk($taskId, Request $request)
    {

        $task = Task::find($taskId);
        $risks = $task->risks;
        if (isset($request->risk_key)) {
            unset($risks[$request->risk_key]);
        }
        $updateRisks = [];
        foreach($risks as $risk) {
            $updateRisks[] = $risk;
        }
        $task->risks = $updateRisks;
        $task->save();
        $project = $task->project;
        return redirect()->route('projects.tasks.show', [$project->id, $taskId]);
    }

    public function start(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->time_begin = now();
        $task->save();
    }

    public function end(Request $request)
    {
        $task = Task::find($request->task_id);
        if (isset($task->time_begin)) {
            $timeBegin = Carbon::create($task->time_begin['date']);
            $now = Carbon::now();
            $workedTime = ($now->diffInSeconds($timeBegin)/3600);
            $task->worked_time += $workedTime;
            $task->time_begin = null;
        }
        $task->save();
        $project = $task->project;
        return route('projects.tasks.show', [$project->id, $task->id]);
    }

    public function saveInline($taskId, Request $request)
    {
        $task = Task::find($taskId);
        if ($request->name) {
            $task->name = $request->name;
        }
        if ($request->priority) {
            $task->priority = $request->priority;
        }
        if ($request->status) {
            $task->status = $request->status;
        }
        if ($request->percent) {
            $task->percent = $request->percent;
        }
        if ($request->required_approve) {
            $task->status = 3;
            $task->required_approved_date = today()->format('Y-m-d');
        }
        if ($request->approve) {
            $task->status = 4;
        }
        if ($request->info) {
            $a = (array) $task->info;
            $a[] = [
                'content' => $request->info,
                'created_at' => today()->format('Y-m-d'),
            ];
            $task->info = $a;
        }
        $task->save();
        if ($task->status == 4 || $request->required_approve || $request->approve || $request->percent == 6 || $request->info) {
            $project = $task->project;
            return route('projects.tasks.show', [$project->id, $task->id]);
        }
    }

    public function updateStatus(Request $request)
    {
        if ($request->sortable1) {
            Issue::whereIn('_id', $request->sortable1)->update([
                'status' => 1
            ]);
        }
        if ($request->sortable2) {
            Issue::whereIn('_id', $request->sortable2)->update([
                'status' => 2
            ]);
        }
        if ($request->sortable3) {
            Issue::whereIn('_id', $request->sortable3)->update([
                'status' => 3
            ]);
        }
        if ($request->sortable4) {
            Issue::whereIn('_id', $request->sortable4)->update([
                'status' => 4
            ]);
        }
        if ($request->sortable5) {
            Issue::whereIn('_id', $request->sortable5)->update([
                'status' => 5
            ]);
        }
        if ($request->sortable6) {
            Issue::whereIn('_id', $request->sortable6)->update([
                'status' => 6
            ]);
        }
        return [
            'alert' => 'alert-success',
            'text' => 'Cập nhật thành công'
        ];
    }

    public function getFormRiskDefend(Request $request)
    {
        if ($request->task_id) {
            $task = Task::find($request->task_id);
        }
        $data = [
            'task' => $task,
            'riskKey' => $request->risk,
        ];
        return view('projects.defend', $data)->render();
    }

    public function getFormIssueDefend(Request $request)
    {
        if ($request->task_id) {
            $task = Task::find($request->task_id);
        }
        if ($request->issue_id) {
            $issue = Issue::find($request->issue_id);
        }
        $data = [
            'task' => $task,
            'issue' => $issue,
        ];
        return view('projects.issue_defend', $data)->render();
    }
}
