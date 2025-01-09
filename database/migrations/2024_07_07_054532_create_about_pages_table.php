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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('title_why')->nullable();
            $table->text('description_why')->nullable();

            $table->string('title_reason_1')->nullable();
            $table->string('title_reason_2')->nullable();
            $table->string('title_reason_3')->nullable();

            $table->text('reason_1')->nullable();
            $table->text('reason_2')->nullable();
            $table->text('reason_3')->nullable();

            $table->text('photo_name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};