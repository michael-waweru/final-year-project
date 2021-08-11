<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('tenant_id')->unsigned()->nullable();
            // $table->foreign('tenant_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('precise_location');
            $table->double('price');
            $table->string('bedrooms')->default('bedsitter');
            $table->string('garage')->default('available');
            $table->string('school');
            $table->string('medical');
            $table->string('church');
            $table->date('year_built');
            $table->string('image')->nullable();
            $table->bigInteger('property_type_id')->unsigned()->nullable();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->string('status')->default('Rent');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
