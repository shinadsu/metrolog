<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_sheet_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_sheet_id');
            $table->unsignedBigInteger('application_id');
            $table->timestamps();

            // Внешние ключи
            $table->foreign('route_sheet_id')->references('id')->on('route_sheets')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_sheet_applications');
    }
};
