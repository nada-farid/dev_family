<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawkmasTable extends Migration
{
    public function up()
    {
        Schema::create('hawkmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('published')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
