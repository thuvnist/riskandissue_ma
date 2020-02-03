<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $collection) {
            $collection->string('project_id');
            $collection->string('description');
            $collection->string('name');
            $collection->string('view_user_ids');
            $collection->string('work_user_ids');
            $collection->string('show_user_ids');
            $collection->string('approve_user_ids');
            $collection->date('time_start');
            $collection->date('time_end');
            $collection->integer('cost');
            $collection->integer('status');
            $collection->integer('estimate');
            $collection->string('create_by');
            $collection->string('chats');
            $collection->string('documents');
            $collection->string('activities');
            $collection->string('info'); // content, created_at
            $collection->string('is_report_info')->default([]); // array date report
            $collection->string('risks');
            $collection->string('issue_ids');
            $collection->integer('status');
            $collection->integer('priority');
            $collection->integer('percent')->default(1); // 0%
            $collection->dateTime('time_begin');
            $collection->integer('worked_times');
            $collection->boolean('is_report');
            $collection->date('required_approved_date');
            $collection->softDeletes();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
