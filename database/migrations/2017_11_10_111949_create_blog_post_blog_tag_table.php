<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_blog_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_post_id')->unsigned();
            $table->integer('blog_tag_id')->unsigned();

        });

        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_post_blog_tag', function (Blueprint $table) {
                $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('CASCADE')
                                                                                   ->onUpdate('CASCADE');
            });
        }

        if (Schema::hasTable('blog_tags')) {
            Schema::table('blog_post_blog_tag', function (Blueprint $table) {
                $table->foreign('blog_tag_id')->references('id')->on('blog_tags')->onDelete('CASCADE')
                                                                                 ->onUpdate('CASCADE');
            });
        }

        Schema::table('blog_post_blog_tag', function (Blueprint $table) {
            $table->unique(['blog_post_id','blog_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('blog_post_blog_tag');
    }
}
