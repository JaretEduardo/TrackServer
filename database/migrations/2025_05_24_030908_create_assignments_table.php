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
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('IDAssignment');
            $table->unsignedBigInteger('ID');
            $table->unsignedBigInteger('orderID');
            $table->timestamps();

            $table->foreign('ID')->references('IDUser')->on('users')->onDelete('cascade');
            $table->foreign('orderID')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
