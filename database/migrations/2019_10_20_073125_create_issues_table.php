<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $collection) {
            $collection->string('columns');
            $collection->string('description');
            $collection->string('template_id');
            $collection->string('user_id');
            $collection->string('children_issue_ids');
            $collection->string('parent_issue_id'); //
            $collection->string('required_issue_id'); //Khóa
            $collection->string('relative_issue_ids'); // Issue có liên quan
            $collection->string('subordinate_issue_ids'); //Phụ thuộc issue
            $collection->string('similar_issue_ids'); // Issue Tương tự
            $collection->string('note');
            $collection->string('created_by');
            $collection->integer('status');
            $collection->boolean('is_report');
            $collection->softDeletes();
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('issues');
    }
}
