<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('like');
            $table->integer('blog_post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        if (Schema::hasTable('users')) {
            Schema::table('blog_ratings', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('blog_ratings');
    }
}
