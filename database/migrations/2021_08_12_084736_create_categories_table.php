<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent')->default(0);
            $table->string('slug');
            $table->enum('is_active' , [0 , 1])->default('1');
            $table->string('view_order')->default(0);
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('categories_articles' , function (Blueprint $table){
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->primary(['category_id' , 'article_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_articles');
        Schema::dropIfExists('categories');
    }
}
