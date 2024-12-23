<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('short_description')->nullable();
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('address');
            $table->timestamps();
        });
    }
}
