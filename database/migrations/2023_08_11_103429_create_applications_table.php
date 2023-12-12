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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id'); // Внешний ключ
            $table->string('type_of_payment')->default('наличный');
            $table->integer('totalPriceValue')->default(0);
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}


