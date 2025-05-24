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
        Schema::create('orders_receive', function (Blueprint $table) {
            $table->bigIncrements('idReceive');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('userID');
            $table->timestamps();

            $table->foreign('userID')->references('IDUser')->on('users')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_receive');
    }
};
