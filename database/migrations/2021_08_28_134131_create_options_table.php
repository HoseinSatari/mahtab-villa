<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('sitename');
            $table->string('description');
            $table->text('keyword');
            $table->string('image');
            $table->string('phone');
            $table->string('phoneadmin');
            $table->string('email');
            $table->string('address');
            $table->longText('location');
            $table->string('instagram');
            $table->string('whatsup');
            $table->string('telegram');
            $table->longText('about');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
