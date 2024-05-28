<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Ontologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OntologieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('private.ontologie.index');
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
                'image' => 'image|max:1024',
                'fichier_owl' => 'required|file|mimes:owl,application/rdf+xml,application/owl+xml|max:1024',
                'status' => 'required|in:Inprogress,Completed',
                'description' => 'required|max:100',
                'categorie' => 'required|in:Maladies,Development',
                'auteur_nom_prenom' => 'required',
                'auteur_email' => 'required|email',
                'auteur_telephone' => 'required',
                'auteur_photo' => 'image|max:1024',
            ],
            [
                'nom.required' => 'Le champ nom est requis.',
                'image.image' => 'L\'image doit être une image.',
                'image.max' => 'L\'image ne doit pas dépasser 1 Mo.',
                'fichier_owl.required' => 'Le champ fichier OWL est requis.',
                'fichier_owl.file' => 'Le champ fichier OWL doit être un fichier.',
                'fichier_owl.mimes' => 'Le champ fichier OWL doit être de type OWL.',
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

         // Création de l'ontologie
        $ontologie = new Ontologie();
        $ontologie->nom = $request->nom;
        $ontologie->status = $request->status;
        $ontologie->categorie = $request->categorie;
        $ontologie->description = $request->description;
        $ontologie->auteur_nom_prenom = $request->auteur_nom_prenom;
        $ontologie->auteur_email = $request->auteur_email;
        $ontologie->auteur_telephone = $request->auteur_telephone;

        if ($request->hasFile('image')) {
           $file = $request->file('image');
           $path = $file->store('images', 'public');

           // Suppression de l'ancienne image si elle existe
           if ($ontologie->image) {
               Storage::disk('public')->delete($ontologie->image);
           }

           $ontologie->image = $path;
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
