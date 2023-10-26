<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->integer('factory_number');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('device_type_id');
            $table->unsignedBigInteger('grsi_number_id');
            $table->date('scheduled_verification_date');
            $table->integer('release_year');
            $table->string('modification');
            $table->string('type');
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand_guides');
            $table->foreign('device_type_id')->references('id')->on('device_type_guides');
            $table->foreign('grsi_number_id')->references('id')->on('grsi_number_guides');
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}

