<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->integer('city_id')->unsigned();
            $table->timestamps();

            if (Schema::hasTable('cities')) {
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE')
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('schools');
    }
}
