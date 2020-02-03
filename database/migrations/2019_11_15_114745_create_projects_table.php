<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $collection) {
            $collection->string('name');
            $collection->string('description');
            $collection->string('customer');
            $collection->string('leader_id');
            $collection->string('user_ids');
            $collection->string('task_ids');
            $collection->date('time_start');
            $collection->date('time_end');
            $collection->integer('cost');
            $collection->integer('status');
            $collection->integer('create_by');
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
        Schema::dropIfExists('projects');
    }
}
