<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('summary')->nullable();
            $table->text('description');
            $table->string('company');
            $table->integer('city_id')->unsigned();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
