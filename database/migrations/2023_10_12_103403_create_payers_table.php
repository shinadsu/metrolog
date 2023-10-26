<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayersTable extends Migration
{
    public function up()
    {
        Schema::create('payers', function (Blueprint $table) {
            $table->id();
            $table->unique('payer_code');
            $table->string('actual')->default('не актуальный');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payers');
    }
}

