<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('question');
            $table->text('answer');

            if (Schema::hasTable('school_faqs')) {
                $table->foreign('school_id')->references('id')->on('schools')->onDelete('CASCADE')
                                                                             ->onUpdate('CASCADE');
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
        Schema::dropIfExists('school_faqs');
    }
}
