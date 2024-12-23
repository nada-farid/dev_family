<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('job')->nullable();
            $table->string('employer')->nullable();
            $table->string('phone_number');
            $table->string('email');
            $table->string('identity_number');
            $table->date('identity_date');
            $table->date('date_of_birth')->nullable();
            $table->string('residence')->nullable();
            $table->string('neighborhood')->nullable();
            $table->timestamps();
        });
    }
}
