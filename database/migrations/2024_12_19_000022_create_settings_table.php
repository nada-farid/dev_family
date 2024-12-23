<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtubte')->nullable();
            $table->string('instagram')->nullable();
            $table->longText('short_descrption')->nullable();
            $table->longText('description')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('donation_url')->nullable();
            $table->string('chairman_description')->nullable();
            $table->string('counter_1_text')->nullable();
            $table->integer('counter_1_value')->nullable();
            $table->string('counter_2_text')->nullable();
            $table->integer('counter_2_value')->nullable();
            $table->string('counter_3_text')->nullable();
            $table->integer('counter_3_value')->nullable();
            $table->string('counter_4_text')->nullable();
            $table->integer('counter_4_value')->nullable();
            $table->longText('home_card_1_text');
            $table->longText('home_card_2_text');
            $table->longText('home_card_3_text');
            $table->string('work_time')->nullable();
            $table->string('pinterest')->nullable();
            $table->longText('vision');
            $table->longText('mission');
            $table->longText('values');
            $table->timestamps();
        });
    }
}
