<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Dataset;
use App\Models\Image;
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
    public function showClasse(string $idOntologie, string $idClasse)
    {
        $ontologie = Ontologie::find($idOntologie);
        $classe = Classe::find($idClasse);
        $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();
    
        $images = Image::with(['classe', 'contour', 'couleur', 'texture'])
        ->where('classe_id', $idClasse)
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('private.classe.show', compact('ontologie', 'dataset', 'classe', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function updateName(Request $request)
    {
        dd($request->all());
        $request->validate([
            'classe_id' => 'required|uuid|exists:classes,id',
            'has_name' => 'required|string|max:255',
        ]);
    
        $classe = Classe::findOrFail($request->classe_id);
        $classe->has_name = $request->has_name;
        $classe->save();
    
        return redirect()->back()->with('success', 'Nom de la classe mis à jour avec succès.');
    }

    public function updateClasse(string $idOntologie, string $idClasse, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'has_name' => 'required',
                'image' => 'nullable|image|max:2024',
                'label' => 'required|max:100',
                'sigle' => 'required|max:100',
                'description' => 'required|max:500',
                'cause' => 'required|max:500',
                'symptome' => 'required|max:500',
                'traitement' => 'required|max:500',
            ],
            [
                'has_name.required' => 'Le champ nom est requis.',
                'label.required' => 'Le champ label est requis.',
                'sigle.required' => 'Le champ sigle est requis.',
                'image.image' => 'Seule les fichiers image sont autorisés.',
                'image.max' => 'L\'image ne doit pas dépasser 1 Mo.',
                'description.required' => 'Le champ description est requis.',
                'description.max' => 'La description ne doit pas dépasser 500 caractères.',
                'cause.required' => 'Le champ cause est requis.',
                'cause.max' => 'Les cause ne doivent pas dépasser 500 caractères.',
                'symptome.required' => 'Le champ symptome est requis.',
                'symptome.max' => 'Les symptomes ne doivent pas dépasser 500 caractères.',
                'traitement.required' => 'Le champ traitement est requis.',
                'traitement.max' => 'Les traitement ne doivent pas dépasser 500 caractères.',
            ]
        );

        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ontologie = Ontologie::find($idOntologie);
        $classe = Classe::find($idClasse);
        $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();
    
        // dd($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');

            // Suppression de l'ancienne image si elle existe
            if ($ontologie->photo) {
                Storage::disk('public')->delete($ontologie->photo);
            }

            $classe->path = $path;
        }

        $classe->has_name = $request->has_name;
        $classe->label = $request->label;
        $classe->sigle = $request->sigle;
        $classe->description = $request->description;
        $classe->cause = $request->cause;
        $classe->symtome = $request->symptome;
        $classe->traitement = $request->traitement;

        $classe->save();
    
        return redirect()->back()->with('success', 'Classe mis à jour avec succès.');
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
        // Récupérer la classe par son ID
        $classe = Classe::find($id);
        $ontologie = $classe->dataset->ontologie;

        // Vérifier si la classe existe
        if (!$classe) {
            return redirect()->back()->with('error', 'Classe non trouvée.');
        }
    
        // Récupérer le chemin du dossier de la classe
        $classePath = "ontologie/{$ontologie->nom}/{$classe->has_name}";
    
        // Récupérer toutes les images associées à cette classe
        $images = Image::where('classe_id', $classe->id)->get();
    
        // Supprimer les fichiers d'images du storage
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
        }
    
        // Supprimer le dossier de la classe du storage
        if (Storage::disk('public')->exists($classePath)) {
            Storage::disk('public')->deleteDirectory($classePath);
        }
    
        // Supprimer les enregistrements d'images de la base de données
        Image::where('classe_id', $classe->id)->delete();
    
        // Supprimer la classe
        $classe->delete();
    
        return redirect()->back()->with('success', 'Classe et images supprimées avec succès.');
    }
}
