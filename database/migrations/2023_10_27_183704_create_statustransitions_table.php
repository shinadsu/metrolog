<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statustransitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('base_status_id');
            $table->unsignedBigInteger('new_status_id');
            $table->unsignedBigInteger('role_id');
            $table->boolean('own_requests_allowed');
            $table->boolean('others_requests_allowed');
            $table->timestamps();
    
            $table->foreign('base_status_id')->references('id')->on('statuses');
            $table->foreign('new_status_id')->references('id')->on('statuses');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statustransitions');
    }
};
