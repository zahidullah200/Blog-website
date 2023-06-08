<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->Integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('yt_iframe');
            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->text('meta_keyword');
            $table->tinyInteger('status')->default('0');
            $table->Integer('created_by');
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
        Schema::dropIfExists('posts');
    }
}
