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
        Schema::create('contours', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('label')->nullable();
            $table->string('description')->nullable();
            $table->decimal('has_area', 8, 2)->nullable();
            $table->decimal('has_perimeter', 8, 2)->nullable();
            $table->decimal('has_width', 8, 2)->nullable();
            $table->decimal('has_height', 8, 2)->nullable();
            $table->decimal('has_normalized_area', 8, 2)->nullable();
            $table->decimal('has_normalized_perimeter', 8, 2)->nullable();
            $table->decimal('has_aspect_ratio', 8, 2)->nullable();
            $table->foreignUuid('image_id')->unique()->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contours');
    }
};
