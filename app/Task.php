<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    protected $fillable = [
        'project_id',
        'description',
        'name',
        'view_user_ids',
        'work_user_ids',
        'show_user_ids',
        'approve_user_ids',
        'time_start',
        'time_end',
        'cost',
        'status',
        'estimate',
        'created_by',
        'chats',
        'documents',
        'activities',
        'risks',
        'issue_ids',
        'priority',
        'user_ids',
        'time_begin',
        'worked_times',
        'is_report',
        'required_approved_date',
        'info',
        'is_report_info',
    ];
    //title type created_by desc created_at priority

    const GIAIQUYET = [
        1 => 'Chấp nhận rủi ro',
        2 => 'Tránh rủi ro',
        3 => 'Chuyển giao rủi ro',
        4 => 'Giảm thiểu rủi ro',
    ];

    const PERCENT = [
        1 => '0%',
        2 => '20%',
        3 => '40%',
        4 => '60%',
        5 => '80%',
        6 => '100%',
    ];

    const STATUS = [
        1 => 'Đang thực hiện',
        2 => 'Quá hạn',
        3 => 'Yêu cầu phê duyệt',
        4 => 'Hoàn thành',
        5 => 'Tạm dừng',
        6 => 'Đã hủy',
    ];

    const COLOR_CLASS = [
        1 => '',
        2 => 'bg-danger',
        3 => '',
        4 => 'bg-success',
        5 => 'bg-warning',
        6 => 'bg-board',
    ];

    const PRIORITY = [
        1 => 'Cao',
        2 => 'Trung bình',
        3 => 'Thấp',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (auth()->user()) {
                $model->created_by = auth()->user()->id;
            }
        });
    }

    public function getCreatedByNameAttribute()
    {
        if($this->created_by) {
            return User::find($this->created_by)->name;
        }
        return '';
    }

    public function users()
    {
        return $this->belongsToMany(User::class, null, 'task_ids', 'user_ids');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function getLabelStatus()
    {
        return $this::STATUS[$this->status];
    }

    public function getLabelStatusNameAttribute()
    {
        return $this::STATUS[$this->status];
    }

    public function getViewUser()
    {
        $viewUsers = [];
        if ($this->view_user_ids) {
            foreach ($this->view_user_ids as $userId) {
                $viewUsers[] = User::find($userId);
            }
        }
        return $viewUsers;
    }

    public function getShowUser()
    {
        $users = [];
        if ($this->show_user_ids) {
            foreach ($this->show_user_ids as $userId) {
                $users[] = User::find($userId);
            }
        }
        return $users;
    }

    public function getApproveUser()
    {
        $users = [];
        if ($this->approve_user_ids) {
            foreach ($this->approve_user_ids as $userId) {
                $users[] = User::find($userId);
            }
        }
        return $users;
    }


    public function getLabelPriority()
    {
        return $this::PRIORITY[$this->priority];
    }

    public function getColorClass()
    {
        return $this::COLOR_CLASS[$this->status];
    }

    public function getColorNameAttribute()
    {
        return $this::COLOR_CLASS[$this->status];
    }

    public function getTimeExpired()
    {
        return date_diff(date_create($this->time_end), date_create(date("Y-m-d")))->format("%R%a");
    }

    public function getRisks()
    {
        $risks = [];
        $risks['excess_cash'] = null;
        $risks['cost'] = false;
        $risks['resource'] = false;
        $risks['excess_resource'] = false;
        $risks['time'] = false;
        $risks['excess_time'] = false;
        $risks['issue'] = false;
        $userCost = $this->getUserCost();
        $userTime = $this->getTimeUser();
        if ($userCost > $this->cost) {
            $risks['cost'] = ($userCost - $this->cost) > 10000 ? ($userCost - $this->cost) : false;
        } else {
            $risks['excess_cash'] = ($this->cost - $userCost) > 10000 ? ($this->cost - $userCost) : false;
        }
        if ($userTime < (int)$this->estimate) {
            $risks['resource'] = ((int)$this->estimate - $userTime) > (int)$this->estimate/10 ? (int)$this->estimate - $userTime : false;
            $risks['excess_time'] = ((int)$this->estimate - $userTime) > (int)$this->estimate/10 ? (int)$this->estimate - $userTime : false;
        } elseif ($userTime > (int)$this->estimate) {
            $risks['time'] = ($userTime - (int)$this->estimate) > (int)$this->estimate/10 ? $userTime - (int)$this->estimate : false;
            $risks['excess_resource'] = ($userTime - (int)$this->estimate) > (int)$this->estimate/10 ? $userTime - (int)$this->estimate : false;
        }
        return $risks;
    }

    public function getUserCost()
    {
        $workUserIds = $this->work_user_ids;
        if (is_array($workUserIds['id'])) {
            $userCost = 0;
            foreach($workUserIds['id'] as $key => $userId) {
                $user =  User::find($userId);
                $userCost += (int)$workUserIds['time'][$key] * $user->salary;
            }
        }
        return $userCost;
    }

    public function getTimeUser() {
        $workUserIds = $this->work_user_ids;
        if (is_array($workUserIds['time'])) {
            $userTime = 0;
            foreach($workUserIds['time'] as $time) {
                $userTime += (int)$time;
            }
        }
        return $userTime;
    }

    public function getWorkUsers()
    {
        $workUsers = [];
        $workUserIds = $this->work_user_ids;
        if (is_array($workUserIds['id'])) {
            foreach($workUserIds['id'] as $key => $userId) {
                $workUsers[$key]['user'] = User::find($userId);
                $workUsers[$key]['time'] = $workUserIds['time'][$key];
            }
        }
        return $workUsers;
    }

    public static function getAllTaskNoneApprove($date)
    {
        $conditionDate = Carbon::now()->subDays($date);
        $tasks = Task::where('required_approved_date', '<', $conditionDate->format('Y-m-d'))
            ->where('required_approved_date', '<>', null)
            ->whereNotIn('status', [4, 5, 6])
            ->get();
        return $tasks;
    }

    public static function getAllTaskExpired()
    {
        $conditionDate = Carbon::now();
        $tasks = Task::where('time_end', '<', $conditionDate->format('Y-m-d'))
            ->whereNotIn('status', [4, 5, 6])
            ->get();
        return $tasks;
    }

    public static function getAllTaskHasExpired()
    {
        $conditionDate = Carbon::now();
        $tasks = Task::where('time_end', $conditionDate->format('Y-m-d'))
            ->whereNot('percent', 6)
            ->get();
        return $tasks;
    }

    public static function reportRiskTaskExpired()
    {
        $tasks = self::getAllTaskHasExpired();
        if (!empty($tasks)) {
            foreach($tasks as $task) {
                if (in_array(3, (array)$task->is_report)) {
                    continue;
                }
                $project = Project::find($task->project_id);
                $data = [
                    'title' => "Quá hạn hoàn thành công việc $task->name",
                    'desc' => "Công việc $task->name quá hạn 1 ngày",
                    'task_id' => $task->id,
                    'status' => 1,
                    'feature' => 3,
                    'type' => 4,
                    'danger' => 3,
                    'priority' => 4,
                    'detected_user' => 0,
                    'inspect_user' => (array) $project->leader_id + (array) $task->approve_user_ids,
                    'approved_user' => $project->leader_id,
                    'user_id' => (array) $task->user_ids,
                    'deadline' => date("Y-m-d", strtotime('tomorrow')),
                    'created_by' => auth()->id(),
                    'created_at' => date("Y-m-d", strtotime('today')),
                ];
                $taskRisk = $task->risks;
                if (empty($taskRisk)) {
                    $taskRisk = [$data];
                } else {
                    $taskRisk[array_key_last($taskRisk) + 1] = $data;
                }
                $task->risks = $taskRisk;
                $taskIsReport = $task->is_report;
                if (empty($taskIsReport)) {
                    $taskIsReport = [3];
                } else {
                    $taskIsReport[array_key_last($taskIsReport) + 1] = 3;
                }
                $task->is_report = $taskIsReport;
                $task->save();
            }
        }
    }

    public static function reportIssue()
    {
        $tasks = self::getAllTaskNoneApprove(2);
        if (!empty($tasks)) {
            foreach($tasks as $task) {
                if (in_array(2, (array)$task->is_report)) {
                    continue;
                }
                $data = [
                    'template_id' => Template::first()->id,
                    'title' => 'Issue report',
                    'description' => "Phê duyệt công việc $task->name chậm 2 ngày!",
                    'task_id' => $task->id,
                    'status' => 3,
                    'type' => 2,
                    'completed' => 1,
                    'priority' => 3,
                ];
                $reportIssue = Issue::create($data);
                $task->issue_ids = (array)$task->issue_ids + [$reportIssue->id];
                $taskIsReport = $task->is_report;
                if (empty($taskIsReport)) {
                    $taskIsReport = [2];
                } else {
                    $taskIsReport[array_key_last($taskIsReport) + 1] = 2;
                }
                $task->is_report = $taskIsReport;
                $task->save();
            }
        }
    }

    public static function reportRisk()
    {
        $tasks = self::getAllTaskNoneApprove(1);
        if (!empty($tasks)) {
            foreach($tasks as $task) {
                if (in_array(1, (array)$task->is_report)) {
                    continue;
                }
                $project = Project::find($task->project_id);
                $data = [
                    'title' => "Phê duyệt công việc $task->name quá 1 ngày",
                    'desc' => "Phê duyệt công việc $task->name chậm 1 ngày có thể làm dự án bị trì trệ và ảnh hưởng đến kết quả làm việc của người khác",
                    'task_id' => $task->id,
                    'status' => 1,
                    'feature' => 3,
                    'type' => 4,
                    'danger' => 2,
                    'priority' => 3,
                    'detected_user' => 0,
                    'inspect_user' => (array) $task->user_ids + (array) $task->approve_user_ids,
                    'approved_user' => $project->leader_id,
                    'user_id' => (array) $task->approve_user_ids,
                    'deadline' => date("Y-m-d", strtotime('tomorrow')),
                    'created_by' => auth()->id(),
                    'created_at' => date("Y-m-d", strtotime('today')),
                ];
                $taskRisk = $task->risks;
                if (empty($taskRisk)) {
                    $taskRisk = [$data];
                } else {
                    $taskRisk[array_key_last($taskRisk) + 1] = $data;
                }
                $task->risks = $taskRisk;
                $taskIsReport = $task->is_report;
                if (empty($taskIsReport)) {
                    $taskIsReport = [1];
                } else {
                    $taskIsReport[array_key_last($taskIsReport) + 1] = 1;
                }
                $task->is_report = $taskIsReport;
                $task->save();
            }
        }
    }

    public static function getAllTaskNoInfoInYesterday()
    {
        $conditionDate = Carbon::now()->subDays(1)->format('Y-m-d');
        $tasks = Task::whereNotIn('status', [4, 5, 6])->get();
        foreach($tasks as $key => $task) {
            $check = true;
            if (!empty($task->is_report_info)) {
                foreach($task->is_report_info as $reportInfo) {
                    if ($reportInfo == $conditionDate) {
                        unset($tasks[$key]);
                        $check = false;
                    }
                }
            }
            if ($check) {
                if (!empty($task->info)) {
                    foreach($task->info as $datum) {
                        if ($datum['created_at'] == $conditionDate) {
                            unset($tasks[$key]);
                        }
                    }
                }
            }
        };
        return $tasks;
    }

    public static function reportIssueInfo()
    {
        $yesterday = Carbon::now()->subDays(1)->format('Y-m-d');
        $tasks = self::getAllTaskNoInfoInYesterday();
        if (!empty($tasks)) {
            foreach($tasks as $task) {
                $project = Project::find($task->project_id);
                $data = [
                    'title' => "Thiếu báo cáo công việc $task->name ngày $yesterday",
                    'desc' => "Thiếu báo cáo công việc $task->name vào ngày $yesterday, cần cập nhật thêm báo cáo",
                    'task_id' => $task->id,
                    'status' => 1,
                    'feature' => 3,
                    'type' => 4,
                    'danger' => 3,
                    'priority' => 4,
                    'detected_user' => 0,
                    'inspect_user' => (array) $project->leader_id + (array) $task->approve_user_ids,
                    'approved_user' => $project->leader_id,
                    'user_id' => (array) $task->user_ids,
                    'deadline' => date("Y-m-d", strtotime('tomorrow')),
                    'created_by' => auth()->id(),
                    'created_at' => date("Y-m-d", strtotime('today')),
                ];
                $taskRisk = $task->risks;
                if (empty($taskRisk)) {
                    $taskRisk = [$data];
                } else {
                    $taskRisk[array_key_last($taskRisk) + 1] = $data;
                }
                $task->risks = $taskRisk;
                $a[] = $yesterday;
                $task->is_report_info = $a;
                $task->save();
            }
        }
    }
}
