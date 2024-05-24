<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Ontologie;
class OntologieSeeder extends Seeder
{
    public function run()
    {
        $ontologies = [
            [
                'nom' => 'Maladie du manioc',
                'description' => 'Ensemble des maladies affectant le manioc.',
                'categorie' => 'Plante',
                'photo' => 'cassava_disease.jpg',
                'status' => 'complet',
                'fichier_owl' => 'cassava_disease.owl',
                'auteur_nom_prenom' => 'Dr. Jane Doe',
                'auteur_email' => 'janedoe@example.com',
                'auteur_telephone' => '+1234567890',
                'auteur_photo' => 'jane_doe.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maladie de la tomate',
                'description' => 'Ensemble des maladies affectant la tomate.',
                'categorie' => 'Plante',
                'photo' => 'tomato_disease.jpg',
                'status' => 'en_cours',
                'fichier_owl' => 'tomato_disease.owl',
                'auteur_nom_prenom' => 'Dr. John Smith',
                'auteur_email' => 'johnsmith@example.com',
                'auteur_telephone' => '+0987654321',
                'auteur_photo' => 'john_smith.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maladie du riz',
                'description' => 'Ensemble des maladies affectant le riz.',
                'categorie' => 'Plante',
                'photo' => 'rice_disease.jpg',
                'status' => 'complet',
                'fichier_owl' => 'rice_disease.owl',
                'auteur_nom_prenom' => 'Dr. Alice Johnson',
                'auteur_email' => 'alicejohnson@example.com',
                'auteur_telephone' => '+1122334455',
                'auteur_photo' => 'alice_johnson.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maladie de la banane',
                'description' => 'Ensemble des maladies affectant la banane.',
                'categorie' => 'Plante',
                'photo' => 'banana_disease.jpg',
                'status' => 'en_cours',
                'fichier_owl' => 'banana_disease.owl',
                'auteur_nom_prenom' => 'Dr. Bob Brown',
                'auteur_email' => 'bobbrown@example.com',
                'auteur_telephone' => '+1223344556',
                'auteur_photo' => 'bob_brown.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maladie de l\'ananas',
                'description' => 'Ensemble des maladies affectant l\'ananas.',
                'categorie' => 'Plante',
                'photo' => 'pineapple_disease.jpg',
                'status' => 'complet',
                'fichier_owl' => 'pineapple_disease.owl',
                'auteur_nom_prenom' => 'Dr. Carol White',
                'auteur_email' => 'carolwhite@example.com',
                'auteur_telephone' => '+1334455667',
                'auteur_photo' => 'carol_white.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Maladie de la mangue',
                'description' => 'Ensemble des maladies affectant la mangue.',
                'categorie' => 'Plante',
                'photo' => 'mango_disease.jpg',
                'status' => 'en_cours',
                'fichier_owl' => 'mango_disease.owl',
                'auteur_nom_prenom' => 'Dr. David Green',
                'auteur_email' => 'davidgreen@example.com',
                'auteur_telephone' => '+1445566778',
                'auteur_photo' => 'david_green.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($ontologies as $ontologyData) {
            $ontologyData['id'] = Str::uuid(); // Générer un UUID pour chaque enregistrement
            Ontologie::create($ontologyData);
        }
    }
}
