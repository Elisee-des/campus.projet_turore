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
        Schema::create('couleurs', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('label')->nullable();
            $table->string('description')->nullable();
            $table->decimal('has_hue_mean', 8, 2)->nullable();
            $table->decimal('has_hue_std', 8, 2)->nullable();
            $table->decimal('has_saturation_mean', 8, 2)->nullable();
            $table->decimal('has_saturation_std', 8, 2)->nullable();
            $table->decimal('has_value_mean', 8, 2)->nullable();
            $table->decimal('has_value_std', 8, 2)->nullable();
            $table->foreignUuid('couleur_id')->unique()->references('id')->on('couleurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couleurs');
    }
};
