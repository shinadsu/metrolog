<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('application_metrologs', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('metrolog_id');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('metrolog_id')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('application_metrologs');
    }
};
