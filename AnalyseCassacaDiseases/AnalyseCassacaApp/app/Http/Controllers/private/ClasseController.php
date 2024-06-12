<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Dataset;
use App\Models\Ontologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function store(Request $request)
    {
        // Récupérer l'ontologie pour extraire les données 'label' et 'description'
        $ontologie = Ontologie::first(); // Assurez-vous d'ajuster cela selon votre logique
        $data = json_decode($ontologie->data, true);
        $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();

        $validator = Validator::make(
            $request->all(),
            [
                'has_name' => 'required',
            ],
            [
                'has_name.required' => 'Le champ nom du dossier est requis.',
            ]
        );

        
        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        // Créer une nouvelle instance de Classe et attribuer les valeurs
        $classe = new Classe();
        $classe->label = $data['http://www.example.org/cassacadiseases.owl#Classe']['label'];
        $classe->description = $data['http://www.example.org/cassacadiseases.owl#Classe']['comment'];
        $classe->has_name = $request->has_name;
        $classe->images_count = 0;
        $classe->size_in_mo = 0;
        $classe->dataset_id = $dataset->id;
        $classe->save();

        return redirect()->back()->with('success', 'Classe créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
