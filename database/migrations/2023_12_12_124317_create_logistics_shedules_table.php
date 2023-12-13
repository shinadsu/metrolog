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
        Schema::create('logistics_shedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logist_id');
            $table->foreign('logist_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_scheduled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics_shedules');
    }
};
