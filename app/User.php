<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'users';
    const ADMIN = 1;
    const USER = 2;
    const DETECTED_USER = [
        0 => 'Hệ thống'
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'level',
        'project_ids',
        'task_ids',
        'issue_ids',
        'salary',
        'template_ids'
    ];

    public function isAdmin()
    {
        if (auth()->user()->level === self::ADMIN) {
            return true;
        }
        return false;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, null, 'user_ids', 'project_ids');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, null, 'user_id', 'issue_ids');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, null, 'user_ids', 'task_ids');
    }

    public static function getNameFromId($id) {

        if (is_array($id)) {
            $name = '';
            foreach($id as $datum) {
                $name .= User::find($datum)->name . " ";
            }
            return $name;
        } elseif ($id) {
            return User::find($id)->name;
        }
    }
}
