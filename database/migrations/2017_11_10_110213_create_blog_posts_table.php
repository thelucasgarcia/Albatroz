<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('cover',80);
            $table->string('video')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        if (Schema::hasTable('users')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('CASCADE')
                                                                                       ->onUpdate('CASCADE');
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
        Schema::dropIfExists('blog_posts');
    }
}
