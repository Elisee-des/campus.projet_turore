<?php

namespace App\Livewire\Private\Ontologie;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Ontologie;

class AjoutOntologie extends Component
{
    use WithFileUploads;
    public $nom, $image, $fichier_owl, $status = 'Inprogress', $description, $categorie='Maladies', $auteur_nom_prenom, $auteur_email, $auteur_telephone, $auteur_photo;

    protected $rules = [
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
    ];
    

    protected $messages = [
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
    ];

    public function sauvegarderOntologie()
    {
        try {
            // Validation des données
            $validatedData = $this->validate();
    
            // Déboguer le type MIME du fichier OWL uploadé
            if ($this->fichier_owl) {
                $this->fichier_owl->getMimeType();
            }
    
            // Gestion de l'upload de l'image
            if ($this->image) {
                $this->image->store('images', 'public');
            }
    
            // Gestion de l'upload du fichier OWL
            $fichierPath = $this->fichier_owl->store('owl', 'public');
    
            // Gestion de l'upload de la photo de l'auteur
            if ($this->auteur_photo) {
                $this->auteur_photo->store('auteur', 'public');
            }
    
            // Création de l'ontologie
            Ontologie::create([
                'nom' => $validatedData['nom'],
                // 'image' => $this->image ? $this->image->hashName() : null,
                // 'fichier_owl' => $fichierPath,
                'status' => $validatedData['status'],
                'description' => $validatedData['description'],
                'categorie' => $validatedData['categorie'],
                'auteur_nom_prenom' => $validatedData['auteur_nom_prenom'],
                'auteur_email' => $validatedData['auteur_email'],
                'auteur_telephone' => $validatedData['auteur_telephone'],
                // 'auteur_photo' => $this->auteur_photo ? $this->auteur_photo->hashName() : null,
            ]);
    
            session()->flash('success', 'Ontologie créée avec succès.');
    
            return redirect()->route('ontologies.index');
        } catch (\Exception $ex) {
            session()->flash('error', 'Un problème est survenu!!');
        }
    }

    private function resetInputFields()
    {
        $this->nom = '';
        $this->image = null;
        $this->fichier_owl = '';
        $this->status = 'Inprogress';
        $this->description = '';
        $this->categorie = 'Maladies';
        $this->auteur_nom_prenom = '';
        $this->auteur_email = '';
        $this->auteur_telephone = '';
        $this->auteur_photo = null;
    }

    public function render()
    {
        return view('livewire.private.ontologie.ajout-ontologie');
    }
}
