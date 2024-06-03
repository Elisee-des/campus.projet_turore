<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Contour;
use App\Models\Couleur;
use App\Models\Dataset;
use App\Models\Entity;
use App\Models\Image;
use App\Models\Ontologie;
use App\Models\Texture;
use ARC2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use EasyRdf\Graph;
use EasyRdf\RdfNamespace;

class OntologieController extends Controller
{
    public function parseOwlFile($path)
    {
        ARC2::inc('RDFParser');

        $config = [
            'ns' => [
                'owl' => 'http://www.w3.org/2002/07/owl#',
                'xsd' => 'http://www.w3.org/2001/XMLSchema#',
                'rdfs' => 'http://www.w3.org/2000/01/rdf-schema#',
                'rdf' => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
            ],
        ];
        
        $parser = ARC2::getRDFParser($config);
        $parser->parse($path);
        return $parser->getSimpleIndex();
    }

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
    
            // Suppression de l'ancien fichier si elle existe
            if ($ontologie->fichier_owl) {
                Storage::disk('public')->delete($ontologie->fichier_owl);
            }
            $ontologie->fichier_owl = $path;

            // Parse OWL file and create models
            $owlFilePath = storage_path('app/public/' . $path);

            // if('http://www.example.org/cassacadiseases.owl#Dataset' &&
            //      'http://www.example.org/cassacadiseases.owl#Image' &&
            //      'http://www.example.org/cassacadiseases.owl#Contour' &&
            //      'http://www.example.org/cassacadiseases.owl#Color' &&
            //      'http://www.example.org/cassacadiseases.owl#Textur'
            //      )
            // {

            // }
            
            // Analyser le fichier OWL et extraire les données
            $owlData = $this->parseOwlFile($owlFilePath);
            
            #Dataset
            $datasetUri = 'http://www.example.org/cassacadiseases.owl#Dataset';
            $datasetDetails = $owlData[$datasetUri];
            $typeDataset = $datasetDetails['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'][0];
            $subClassOfDataset = $datasetDetails['http://www.w3.org/2000/01/rdf-schema#subClassOf'][0];
            $labelDataset = $datasetDetails['http://www.w3.org/2000/01/rdf-schema#label'][0];
            $commentDataset = $datasetDetails['http://www.w3.org/2000/01/rdf-schema#comment'][0];

            #Image
            $imageUri = 'http://www.example.org/cassacadiseases.owl#Image';
            $imageDetails = $owlData[$imageUri];
            $typeImage = $imageDetails['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'][0];
            $subClassOfImage = $imageDetails['http://www.w3.org/2000/01/rdf-schema#subClassOf'][0];
            $labelImage = $imageDetails['http://www.w3.org/2000/01/rdf-schema#label'][0];
            $commentImage = $imageDetails['http://www.w3.org/2000/01/rdf-schema#comment'][0];

            #Contour
            $contourUri = 'http://www.example.org/cassacadiseases.owl#Contour';
            $contourDetails = $owlData[$contourUri];
            $typeContour = $contourDetails['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'][0];
            $subClassOfContour = $contourDetails['http://www.w3.org/2000/01/rdf-schema#subClassOf'][0];
            $labelContour = $contourDetails['http://www.w3.org/2000/01/rdf-schema#label'][0];
            $commentContour = $contourDetails['http://www.w3.org/2000/01/rdf-schema#comment'][0];

            #Color
            $colorUri = 'http://www.example.org/cassacadiseases.owl#Color';
            $colorDetails = $owlData[$colorUri];
            $typeColor = $colorDetails['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'][0];
            $subClassOfColor = $colorDetails['http://www.w3.org/2000/01/rdf-schema#subClassOf'][0];
            $labelColor = $colorDetails['http://www.w3.org/2000/01/rdf-schema#label'][0];
            $commentColor = $colorDetails['http://www.w3.org/2000/01/rdf-schema#comment'][0];

            #Texture
            $textureUri = 'http://www.example.org/cassacadiseases.owl#Texture';
            $textureDetails = $owlData[$textureUri];
            $typeTexture = $textureDetails['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'][0];
            $subClassOfTexture = $textureDetails['http://www.w3.org/2000/01/rdf-schema#subClassOf'][0];
            $labelTexture = $textureDetails['http://www.w3.org/2000/01/rdf-schema#label'][0];
            $commentTexture = $textureDetails['http://www.w3.org/2000/01/rdf-schema#comment'][0];

            $dataset = new Dataset();
            $dataset->label = ;
            $dataset->description = ;
            $dataset->nom = ;
            $dataset->has_url = ;
            $dataset->ontologie_id = $ontologie->id;

            $image = new Image();
            $image->label = ;
            $image->description = ;
            $image->nom = ;
            $image->path = ;
            $image->has_img_size = ;
            $image->dataset_id = $dataset->id;
            
            $contour = new Contour();
            $contour->label = ;
            $contour->description = ;
            $contour->has_area = ;
            $contour->has_aspect_ratio = ;
            $contour->has_height = ;
            $contour->has_normalized_area = ;
            $contour->has_normalized_perimeter = ;
            $contour->has_perimeter = ;
            $contour->has_width = ;
            $contour->image_id = $image->id;

            $couleur = new Couleur();
            $couleur->label = ;
            $couleur->description = ;
            $couleur->has_hue_mean = ;
            $couleur->has_hue_std = ;
            $couleur->has_saturation_mean = ;
            $couleur->has_saturation_std = ;
            $couleur->has_value_std = ;
            $couleur->image_id = $image->id;

            $texture = new Texture();
            $texture->label = ;
            $texture->description = ;
            $texture->has_contrast = ;
            $texture->has_correlation = ;
            $texture->has_dissimilarity = ;
            $texture->has_energy = ;
            $texture->has_homogeneity = ;
            $texture->image_id = $image->id;
        }

        $ontologie->save();

        return redirect()->route('ontologies.index')->with('success', 'Ontologie crée avec succès !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ontologie = Ontologie::find($id);
        return view('private.ontologie.show', compact('ontologie'));
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
