<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Ontologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OntologieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ontologies = Ontologie::all();
        return view('private.ontologie.index', compact('ontologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.ontologie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required',
                'image' => 'image|max:2024',
                'fichier_owl' => 'required|file|max:5048',
                'status' => 'required|in:en_cours,complet',
                'description' => 'required|max:100',
                'categorie' => 'required|in:Maladies,Development',
                'auteur_nom_prenom' => 'required',
                'auteur_email' => 'required|email',
                'auteur_telephone' => 'required',
                'auteur_photo' => 'image|max:2024',
            ],
            [
                'nom.required' => 'Le champ nom est requis.',
                'image.image' => 'L\'image doit être une image.',
                'image.max' => 'L\'image ne doit pas dépasser 1 Mo.',
                'fichier_owl.required' => 'Le champ fichier OWL est requis.',
                'fichier_owl.file' => 'Le champ fichier OWL doit être un fichier.',
                'fichier_owl.max' => 'Le fichier OWL ne doit pas dépasser 1 Mo.',
                'status.required' => 'Le champ status est requis.',
                'status.in' => 'Le champ status doit être Inprogress ou Completed.',
                'description.required' => 'Le champ description est requis.',
                'description.max' => 'La description ne doit pas dépasser 100 caractères.',
                'categorie.required' => 'Le champ catégorie est requis.',
                'categorie.in' => 'Le champ catégorie doit être Maladies ou Development.',
                'auteur_nom_prenom.required' => 'Le champ nom de l\'auteur est requis.',
                'auteur_email.required' => 'Le champ email de l\'auteur est requis.',
                'auteur_email.email' => 'Veuillez entrer une adresse email valide pour l\'auteur.',
                'auteur_telephone.required' => 'Le champ téléphone de l\'auteur est requis.',
                'auteur_photo.image' => 'La photo de l\'auteur doit être une image.',
                'auteur_photo.max' => 'La photo de l\'auteur ne doit pas dépasser 1 Mo.',
            ]
        );

        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Définir le tableau de couleurs possibles
        $colors = ['bg-soft-danger', 'bg-soft-info', 'bg-soft-dark', 'bg-soft-success'];
        // Sélectionner aléatoirement une couleur
        $randomColor = $colors[array_rand($colors)];

         // Création de l'ontologie
        $ontologie = new Ontologie();
        $ontologie->nom = $request->nom;
        $ontologie->status = $request->status;
        $ontologie->categorie = $request->categorie;
        $ontologie->description = $request->description;
        $ontologie->auteur_nom_prenom = $request->auteur_nom_prenom;
        $ontologie->auteur_email = $request->auteur_email;
        $ontologie->auteur_telephone = $request->auteur_telephone;
        $ontologie->color = $randomColor; // Assigner la couleur aléatoire

        if ($request->hasFile('image')) {
           $file = $request->file('image');
           $path = $file->store('images', 'public');

           // Suppression de l'ancienne image si elle existe
           if ($ontologie->photo) {
               Storage::disk('public')->delete($ontologie->photo);
           }

           $ontologie->photo = $path;
       }

       if ($request->hasFile('auteur_photo')) {
        $file = $request->file('auteur_photo');
        $path = $file->store('images', 'public');

        // Suppression de l'ancienne image si elle existe
        if ($ontologie->auteur_photo) {
            Storage::disk('public')->delete($ontologie->image);
        }

        $ontologie->auteur_photo = $path;
        }

        if ($request->hasFile('fichier_owl')) {
            $file = $request->file('fichier_owl');
            $path = $file->store('fichier', 'public');
    
            // Suppression de l'ancienne image si elle existe
            if ($ontologie->fichier_owl) {
                Storage::disk('public')->delete($ontologie->fichier_owl);
            }
            $ontologie->fichier_owl = $path;
        }

        $ontologie->save();

        return redirect()->route('ontologies.index')->with('success', 'Ontologie crée avec succès !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('private.ontologie.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ontologie = Ontologie::find($id);
        return view('private.ontologie.edit', compact('ontologie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required',
                'image' => 'sometimes|image|max:2024',
                'fichier_owl' => 'sometimes|required|file|max:5048',
                'status' => 'required|in:en_cours,complet',
                'description' => 'required|max:100',
                'categorie' => 'required|in:Maladies,Development',
                'auteur_nom_prenom' => 'required',
                'auteur_email' => 'required|email',
                'auteur_telephone' => 'required',
                'auteur_photo' => 'sometimes|image|max:2024',
            ],
            [
                'nom.required' => 'Le champ nom est requis.',
                'image.sometimes' => 'L\'image doit être une image.',
                'image.max' => 'L\'image ne doit pas dépasser 1 Mo.',
                'fichier_owl.sometimes' => 'Le champ fichier OWL est requis.',
                'fichier_owl.file' => 'Le champ fichier OWL doit être un fichier.',
                'fichier_owl.max' => 'Le fichier OWL ne doit pas dépasser 1 Mo.',
                'status.required' => 'Le champ status est requis.',
                'status.in' => 'Le champ status doit être Inprogress ou Completed.',
                'description.required' => 'Le champ description est requis.',
                'description.max' => 'La description ne doit pas dépasser 100 caractères.',
                'categorie.required' => 'Le champ catégorie est requis.',
                'categorie.in' => 'Le champ catégorie doit être Maladies ou Development.',
                'auteur_nom_prenom.required' => 'Le champ nom de l\'auteur est requis.',
                'auteur_email.required' => 'Le champ email de l\'auteur est requis.',
                'auteur_email.email' => 'Veuillez entrer une adresse email valide pour l\'auteur.',
                'auteur_telephone.required' => 'Le champ téléphone de l\'auteur est requis.',
                'auteur_photo.sometimes' => 'La photo de l\'auteur doit être une image.',
                'auteur_photo.max' => 'La photo de l\'auteur ne doit pas dépasser 1 Mo.',
            ]
        );
        
        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Définir le tableau de couleurs possibles
        $colors = ['bg-soft-danger', 'bg-soft-info', 'bg-soft-dark', 'bg-soft-success'];
        // Sélectionner aléatoirement une couleur
        $randomColor = $colors[array_rand($colors)];

         // Création de l'ontologie
        $ontologie = Ontologie::find($id);
        if ($ontologie) {
            $ontologie->nom = $request->nom;
            $ontologie->status = $request->status;
            $ontologie->categorie = $request->categorie;
            $ontologie->description = $request->description;
            $ontologie->auteur_nom_prenom = $request->auteur_nom_prenom;
            $ontologie->auteur_email = $request->auteur_email;
            $ontologie->auteur_telephone = $request->auteur_telephone;
            $ontologie->color = $randomColor; // Assigner la couleur aléatoire
    
            if ($request->hasFile('image')) {
               $file = $request->file('image');
               $path = $file->store('images', 'public');
    
               // Suppression de l'ancienne image si elle existe
               if ($ontologie->photo) {
                   Storage::disk('public')->delete($ontologie->photo);
               }
    
               $ontologie->photo = $path;
           }
    
           if ($request->hasFile('auteur_photo')) {
            $file = $request->file('auteur_photo');
            $path = $file->store('images', 'public');
    
            // Suppression de l'ancienne image si elle existe
            if ($ontologie->auteur_photo) {
                Storage::disk('public')->delete($ontologie->image);
            }
    
            $ontologie->auteur_photo = $path;
            }
    
            if ($request->hasFile('fichier_owl')) {
                $file = $request->file('fichier_owl');
                $path = $file->store('fichier', 'public');
        
                // Suppression de l'ancienne image si elle existe
                if ($ontologie->fichier_owl) {
                    Storage::disk('public')->delete($ontologie->fichier_owl);
                }
                $ontologie->fichier_owl = $path;
            }
    
            $ontologie->save();

        return redirect()->route('ontologies.index')->with('success', 'Ontologie mise à jour avec succès !!!');

        }
        else{
            return redirect()->route('ontologies.index')->with('error', 'Ontologie non trouver !!!');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->withErrors(['password' => 'Le mot de passe actuel est incorrect']);
        }

        $ontologie = Ontologie::findOrFail($id);

        // Suppression des images associées
        if ($ontologie->photo) {
            Storage::disk('public')->delete($ontologie->photo);
        }

        $ontologie->delete();

        return redirect()->route('ontologies.index')->with('success', "L'ontologie a été supprimée avec succès");
    }
}
