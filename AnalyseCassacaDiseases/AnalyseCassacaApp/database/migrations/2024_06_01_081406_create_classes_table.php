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
        Schema::create('classes', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->string('sigle')->nullable();
            $table->string('images_count')->nullable();
            $table->string('size_in_mo')->nullable();
            $table->text('cause')->nullable();
            $table->text('symtome')->nullable();
            $table->text('traitement')->nullable();
            $table->string('path')->nullable();
            $table->string('has_name')->nullable();
            $table->foreignUuid('dataset_id')->references('id')->on('datasets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
