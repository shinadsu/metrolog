<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 128);
            $table->string('status')->default('не завершена');
            $table->string('type_of_payment')->default('наличный');
            // $table->unsignedBigInteger('address_id')->nullable();
            // $table->unsignedBigInteger('device_id')->nullable();
            // $table->unsignedBigInteger('payer_id')->nullable();
            // $table->unsignedBigInteger('phone_id')->nullable();
            
            // $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
            // $table->foreign('device_id')->references('id')->on('devices')->onDelete('set null');
            // $table->foreign('payer_id')->references('id')->on('payers')->onDelete('set null');
            // $table->foreign('phone_id')->references('id')->on('phones')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}


