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
            // [
            //     'nom' => 'Maladie du manioc',
            //     'description' => 'Ensemble des maladies affectant le manioc.',
            //     'categorie' => 'Plante',
            //     'photo' => 'cassava_disease.jpg',
            //     'status' => 'complet',
            //     'fichier_owl' => 'cassava_disease.owl',
            //     'auteur_nom_prenom' => 'Dr. Jane Doe',
            //     'auteur_email' => 'janedoe@example.com',
            //     'auteur_telephone' => '+1234567890',
            //     'auteur_photo' => 'jane_doe.jpg',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // Cassava Bacterial Blight (CBB)
            // Cassava Brown Streak Disease (CBSD)
            // Cassava Green Mottle (CGM)
            // Cassava Mosaic Disease (CMD)
            // Healthy
            
            // [
            //     'nom' => 'Maladie de la tomate',
            //     'description' => 'Ensemble des maladies affectant la tomate.',
            //     'categorie' => 'Plante',
            //     'status' => 'en_cours',
            //     'fichier_owl' => 'owl.file',
            //     'auteur_nom_prenom' => 'Dr. John Smith',
            //     'auteur_email' => 'johnsmith@example.com',
            //     'auteur_telephone' => '+0987654321',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'nom' => 'Maladie du riz',
            //     'description' => 'Ensemble des maladies affectant le riz.',
            //     'categorie' => 'Plante',
            //     'status' => 'complet',
            //     'auteur_nom_prenom' => 'Dr. Alice Johnson',
            //     'auteur_email' => 'alicejohnson@example.com',
            //     'auteur_telephone' => '+1122334455',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'nom' => 'Maladie de la banane',
            //     'description' => 'Ensemble des maladies affectant la banane.',
            //     'categorie' => 'Plante',
            //     'status' => 'en_cours',
            //     'auteur_nom_prenom' => 'Dr. Bob Brown',
            //     'auteur_email' => 'bobbrown@example.com',
            //     'auteur_telephone' => '+1223344556',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'nom' => 'Maladie de l\'ananas',
            //     'description' => 'Ensemble des maladies affectant l\'ananas.',
            //     'categorie' => 'Plante',
            //     'status' => 'complet',
            //     'fichier_owl' => 'pineapple_disease.owl',
            //     'auteur_nom_prenom' => 'Dr. Carol White',
            //     'auteur_email' => 'carolwhite@example.com',
            //     'auteur_telephone' => '+1334455667',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'nom' => 'Maladie de la mangue',
            //     'description' => 'Ensemble des maladies affectant la mangue.',
            //     'categorie' => 'Plante',
            //     'status' => 'en_cours',
            //     'auteur_nom_prenom' => 'Dr. David Green',
            //     'auteur_email' => 'davidgreen@example.com',
            //     'auteur_telephone' => '+1445566778',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        // foreach ($ontologies as $ontologyData) {
        //     $ontologyData['id'] = Str::uuid(); // Générer un UUID pour chaque enregistrement
        //     Ontologie::create($ontologyData);
        // }
    }
}
