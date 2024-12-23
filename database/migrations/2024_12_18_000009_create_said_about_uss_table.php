<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaidAboutUssTable extends Migration
{
    public function up()
    {
        Schema::create('said_about_uss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position');
            $table->string('review');
            $table->timestamps();
        });
    }
}
