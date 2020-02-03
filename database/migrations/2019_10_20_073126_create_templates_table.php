<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('templates', function (Blueprint $collection) {
            $collection->string('name');
            $collection->string('columns');
            $collection->string('user_ids');
            $collection->string('created_by');
            $collection->string('issue_ids');
            $collection->string('description');
            $collection->softDeletes();
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('templates');
    }
}
