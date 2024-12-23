<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerGuidesTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('title');
            $table->timestamps();
        });
    }
}
