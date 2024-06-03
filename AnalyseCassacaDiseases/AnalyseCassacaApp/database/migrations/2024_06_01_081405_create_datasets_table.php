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
        Schema::create('datasets', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('nom')->nullable();
            $table->string('label')->nullable();
            $table->string('description')->nullable();
            $table->string('has_creation_date')->nullable();
            $table->string('has_url')->nullable();
            $table->decimal('has_size', 8, 2)->nullable();
            $table->string('has_author')->nullable();
            $table->foreignUuid('ontologie_id')->unique()->references('id')->on('ontologies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
