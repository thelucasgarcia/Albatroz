<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->integer('blog_post_id')->unsigned();
        });

        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_galleries', function (Blueprint $table) {
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
        Schema::dropIfExists('blog_galleries');
    }
}
