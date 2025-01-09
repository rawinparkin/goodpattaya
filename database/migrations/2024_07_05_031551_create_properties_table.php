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

            $table->integer('category_id');
            $table->string('cover_photo')->nullable();
            $table->integer('is_sell')->nullable();
            $table->integer('is_rent')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('renting_price')->nullable();

            $table->string('bed')->nullable();
            $table->string('bath')->nullable();
            $table->string('land')->nullable();
            $table->string('area')->nullable();
            $table->integer('built_year')->nullable();

            $table->integer('location_id')->nullable();
            $table->integer('agent_id')->nullable();

            $table->integer('is_featured')->nullable();
            $table->integer('is_active')->nullable();


            $table->timestamps();
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