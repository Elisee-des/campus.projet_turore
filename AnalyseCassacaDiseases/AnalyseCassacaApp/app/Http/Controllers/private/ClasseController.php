<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Dataset;
use App\Models\Ontologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function indexCreate($idOntologie)
     {
        $ontologie = Ontologie::find($idOntologie); // Assurez-vous d'ajuster cela selon votre logique

        return view('private.classe.create', compact('ontologie'));
     }

     public function indexCreateAction(Request $request, $idOntologie)
     {
         // Récupérer l'ontologie pour extraire les données 'label' et 'description'
         $ontologie = Ontologie::find($idOntologie); // Assurez-vous d'ajuster cela selon votre logique
         $data = json_decode($ontologie->data, true);
         $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();

         $validator = Validator::make(
             $request->all(),
             [
                 'has_name' => 'required',
                 'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048', // Validation pour l'image
                 'description' => 'required|max:4000',
                 'cause' => 'required|max:4000',
                 'symtome' => 'required|max:4000',
                 'sigle' => 'required',
                 'traitement' => 'required|max:4000',
             ],
             [
                 'has_name.required' => 'Le champ nom du dossier est requis.',
                 'sigle.required' => 'Le champ sigle est requis.',
                 'image.required' => 'Le champ image est requis.',
                 'image.image' => 'Le fichier doit être une image.',
                 'image.mimes' => 'L\'image doit être un fichier de type : jpeg, png, jpg, svg.',
                 'image.max' => 'La taille de l\'image ne peut pas dépasser 2 Mo.',
                 'description.required' => 'Le champ description est requis.',
                 'description.max' => 'La description ne peut pas dépasser 1000 caractères.',
                 'cause.required' => 'Le champ cause est requis.',
                 'cause.max' => 'La cause ne peut pas dépasser 1000 caractères.',
                 'symtome.required' => 'Le champ symptôme est requis.',
                 'symtome.max' => 'Le symptôme ne peut pas dépasser 1000 caractères.',
                 'traitement.required' => 'Le champ traitement est requis.',
                 'traitement.max' => 'Le traitement ne peut pas dépasser 1000 caractères.',
             ]
         );
     
         // On retourne toutes les erreurs
         if ($validator->fails()) {
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
         }
     
         // Gérer l'upload de l'image
         $imagePath = '';
         if ($request->hasFile('image')) {
             // Supprimer l'ancienne image si elle existe
             $classe = Classe::where('has_name', $request->has_name)->first();
             if ($classe && $classe->path) {
                 Storage::disk('public')->delete($classe->path);
             }
             
             // Stocker la nouvelle image
             $imagePath = $request->file('image')->store('images', 'public');
         }
     
         // Créer une nouvelle instance de Classe et attribuer les valeurs
         $classe = new Classe();
         $classe->label = $data['http://www.example.org/cassacadiseases.owl#Classe']['label'];
         $classe->description = $request->description;
         $classe->has_name = $request->has_name;
         $classe->images_count = 0;
         $classe->path = $imagePath;
         $classe->size_in_mo = 0;
         $classe->cause = $request->cause;
         $classe->sigle = $request->sigle;
         $classe->symtome = $request->symtome;
         $classe->traitement = $request->traitement;
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
