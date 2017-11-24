<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('name');
            $table->integer('course_type_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('workload');
            $table->string('period');
            $table->string('schedule');
            $table->string('observations')->nullable();
            $table->text('description');

            if (Schema::hasTable('courses')) {
                $table->foreign('school_id')->references('id')->on('schools')->onDelete('CASCADE')
                                                                             ->onUpdate('CASCADE');
            } 
            if (Schema::hasTable('courses')) {
                $table->foreign('course_type_id')->references('id')->on('course_type')->onUpdate('CASCADE');
            } 
            if (Schema::hasTable('courses')) {
                $table->foreign('language_id')->references('id')->on('languages')->onUpdate('CASCADE');
            } 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
