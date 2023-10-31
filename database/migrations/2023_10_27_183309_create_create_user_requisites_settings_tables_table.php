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
        Schema::create('user_requisites_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('propses_id');
            $table->unsignedBigInteger('status_id');
            $table->enum('access_type', ['required', 'disabled', 'hidden']);
            $table->boolean('own_requests_allowed');
            $table->boolean('others_requests_allowed');
            $table->boolean('setting_enabled');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('propses_id')->references('id')->on('props');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_user_requisites_settings_tables');
    }
};
