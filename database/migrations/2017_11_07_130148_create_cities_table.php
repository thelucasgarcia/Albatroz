<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',80)->unique();
            $table->string('slug',100);
            $table->unsignedInteger('country_id');
            $table->string('image');

            if (Schema::hasTable('countries')) {
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE')
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
        Schema::dropIfExists('cities');
    }
}
