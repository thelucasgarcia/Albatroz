<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',80);
            $table->string('email')->nullable();
            $table->text('text');
            $table->integer('blog_post_id')->unsigned();
            $table->timestamps();
        });

        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_comments', function (Blueprint $table) {
                $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('CASCADE')
                                                                                   ->onUpdate('CASCADE');;
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
        Schema::dropIfExists('blog_comments');
    }
}
