<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->string('name');
            $collection->string('code');
            $collection->string('project_ids');
            $collection->string('task_ids');
            $collection->string('issue_ids');
            $collection->string('salary');
            $collection->unique('email');
            $collection->string('password', 64);
            $collection->string('template_ids');
            $collection->integer('level')->default(\App\User::USER);
            $collection->softDeletes();
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
