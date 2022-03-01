<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryVilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_villas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Villa_id');
            $table->foreign('Villa_id')->references('id')->on('vilas')->onDelete('cascade');
            $table->string('image');
            $table->string('alt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_villas');
    }
}
