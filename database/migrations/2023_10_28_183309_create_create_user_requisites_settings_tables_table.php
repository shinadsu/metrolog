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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('propses_id');
            $table->unsignedBigInteger('status_id');
            $table->enum('access_type', ['required', 'disabled', 'hidden']);
            $table->boolean('setting_enabled');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
