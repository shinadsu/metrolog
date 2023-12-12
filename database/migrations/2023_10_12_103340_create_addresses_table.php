<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('addressesArea');
            $table->string('addressCity');
            $table->string('addressSettlement');
            $table->string('addressPlanningStructure');
            $table->string('addressStreet');
            $table->string('addressHouse');
            $table->string('addressApartment');
            $table->string('full_address');
            $table->json('combined_address');
            $table->string('object_guid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

