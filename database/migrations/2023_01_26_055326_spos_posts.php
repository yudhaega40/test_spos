<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SposPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spos_posts',function(Blueprint $table){
            $table->id('post_id');
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->integer('photo_id')->nullable();
            $table->char('title',100);
            $table->text('post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spos_posts');
    }
}
