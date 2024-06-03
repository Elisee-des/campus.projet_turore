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
        Schema::create('textures', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('label')->nullable();
            $table->string('description')->nullable();
            $table->decimal('has_contrast', 8, 2)->nullable();
            $table->decimal('has_dissimilarity', 8, 2)->nullable();
            $table->decimal('has_energy', 8, 2)->nullable();
            $table->decimal('has_homogeneity', 8, 2)->nullable();
            $table->decimal('has_correlation', 8, 2)->nullable();
            $table->foreignUuid('image_id')->unique()->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textures');
    }
};
