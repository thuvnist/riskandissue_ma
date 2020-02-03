<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Project extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'projects';
    protected $fillable = [
        'name',
        'description',
        'customer',
        'leader_id',
        'user_ids',
        'task_ids',
        'time_start',
        'time_end',
        'cost',
        'status',
        'create_by',
    ];

    const STATUS = [
        1 => 'Đang phát triển',
        2 => 'Bảo trì',
        3 => 'Hoàn tất',
        4 => 'Chưa bắt đầu',
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
        return User::find($this->created_by)->name;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, null, 'project_ids', 'user_ids');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function countIssueByStatus($status)
    {
        $count = 0;
        foreach($this->tasks as $task) {
            $count += $task->issues->where('status', $status)->count();
        }
        return $count;
    }

    public function countAllIssue()
    {
        $count = 0;
        foreach($this->tasks as $task) {
            $count += $task->issues->count();
        }
        return $count;
    }
}
