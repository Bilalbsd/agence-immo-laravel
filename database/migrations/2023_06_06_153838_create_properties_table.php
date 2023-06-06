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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('city');
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area');
            $table->unsignedBigInteger('agend_id');
            $table->timestamps();

            $table->foreign('agend_id')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
