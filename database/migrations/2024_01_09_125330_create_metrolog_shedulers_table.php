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
        Schema::create('metrolog_shedulers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metrolog_id');
            $table->dateTime('shedule_date_start');
            $table->dateTime('shedule_date_end');
            $table->boolean('is_working_day');
            $table->boolean('day_off'); // выходной
            $table->boolean('sick_leave'); //  указывает, что оператор на больничном.
            $table->boolean('other_leave'); // для других типов отсутствия.
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('metrolog_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->index('metrolog_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metrolog_shedulers');
    }
};
