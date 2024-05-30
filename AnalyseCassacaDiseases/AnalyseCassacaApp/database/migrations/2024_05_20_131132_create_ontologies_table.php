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
        Schema::create('ontologies', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->string('categorie')->nullable();
            $table->string('photo')->nullable();
            $table->string('color')->default('bg-soft-danger');
            $table->enum('status', ['en_cours', 'complet'])->default('en_cours');
            $table->string('fichier_owl');
            $table->string('auteur_nom_prenom')->nullable();
            $table->string('auteur_email')->nullable();
            $table->string('auteur_telephone')->nullable();
            $table->string('auteur_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ontologies');
    }
};
