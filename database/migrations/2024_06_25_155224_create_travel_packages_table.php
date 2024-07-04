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
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('thumbnail');
            $table->string('description', 200);
            $table->integer('rate');
            $table->bigInteger('original_price')->unsigned();
            $table->bigInteger('current_price')->unsigned();
            $table->integer('day')->unsigned();
            $table->integer('night')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
