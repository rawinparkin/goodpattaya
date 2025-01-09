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
        Schema::create('property_titles', function (Blueprint $table) {
            $table->id();

            $table->integer('property_id');
            $table->text('title');
            $table->text('description');
            $table->string('tags')->nullable();
            $table->string('slug')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_titles');
    }
};