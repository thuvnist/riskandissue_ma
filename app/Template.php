<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Template extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'templates';
    protected $fillable = [
        'name',
        'columns',
        'user_ids',
        'created_by',
        'issue_ids',
        'description',
    ];

    const LABEL_OPTIONS = [
        'name' => 'Tên template',
        'show_user_id' => 'Những nhân viên có quyền xem',
        'use_user_id' => 'Người thực hiện',
        'approve_user_id' => 'Người phê duyệt',
        'view_user_id' => 'Người quan sát',
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

    public function getIssueAttributes()
    {
        return Issue::where('template_id', $this->_id);
    }

    public function getNumberIssueAttributes()
    {
        return $this->getIssueAttributes()->count();
    }

    public function getApproveUserName()
    {
        $user = User::find($this->approve_user_id)->first();
        return $user->name;
    }

    public function getUseUserName()
    {
        $user = User::find($this->use_user_id)->first();
        return $user->name;
    }

    public function getShowUserName()
    {
        $user = User::find($this->show_user_id)->first();
        return $user->name;
    }

    public function getViewUserName()
    {
        $user = User::find($this->view_user_id)->first();
        return $user->name;
    }

    public function getCreatedByNameAttribute()
    {
        return User::find($this->created_by)->name;
    }
}
