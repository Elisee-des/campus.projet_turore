<?php
namespace App\Livewire\Private\Annotation;

use App\Models\Image;
use App\Models\Contour;
use App\Models\Couleur;
use App\Models\Texture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use GuzzleHttp\Client;

class ImageAnnotation extends Component
{
    use WithFileUploads;

    public $images = [];
    public $uploadedImages = [];
    public $ontologie;
    public $classe;
    public $label;
 

    public function mount($ontologie, $classe)
    {
        $this->ontologie = $ontologie;
        $this->classe = $classe;
        $this->label = $classe->has_name;
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
            'label' => 'required',
        ]);

        // Configuration du client Guzzle pour faire des requêtes HTTP
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:5000',
            'timeout'  => 10.0,
        ]);

        foreach ($this->images as $image) {
            $path = $image->store("ontologie/{$this->ontologie->nom}/{$this->classe->has_name}", 'public');
            $size = $image->getSize() / (1024 * 1024);
            $size_formatted = number_format($size, 2);

            // Enregistrer l'image dans la base de données
            $uploadedImage = Image::create([
                'nom' => $image->getClientOriginalName(),
                'path' => $path,
                'has_img_size' => $size_formatted,
                'label' => $this->label,
                'classe_id' => $this->classe->id,
            ]);

            // Faire une requête à votre API Flask pour obtenir les caractéristiques
            try {
                $response = $client->post('/annotation-images', [
                    'json' => [
                        'image' => base64_encode(file_get_contents(storage_path("app/public/{$path}"))),
                        'label' => $this->label,
                        'description' => 'Description de l\'image', // Ajoutez une description si nécessaire
                    ]
                ]);

                $data = json_decode($response->getBody(), true);

                // Enregistrer les caractéristiques dans les entités Contour, Couleur et Texture
                $uploadedImage->contour()->create([
                    'label' => $this->label,
                    'description' => 'Description du contour', // Remplacez par la description réelle si disponible
                    'has_area' => $data['caracteristiques_contour']['area'],
                    'has_perimeter' => $data['caracteristiques_contour']['perimeter'],
                    'has_width' => $data['caracteristiques_contour']['width'],
                    'has_height' => $data['caracteristiques_contour']['height'],
                    'has_normalized_area' => $data['caracteristiques_contour']['normalized_area'],
                    'has_normalized_perimeter' => $data['caracteristiques_contour']['normalized_perimeter'],
                    'has_aspect_ratio' => $data['caracteristiques_contour']['aspect_ratio'],
                    'image_id' => $uploadedImage->id,
                ]);

                $uploadedImage->couleur()->create([
                    'label' => $this->label,
                    'description' => 'Description de la couleur', // Remplacez par la description réelle si disponible
                    'has_hue_mean' => $data['caracteristiques_couleur']['hue_mean'],
                    'has_hue_std' => $data['caracteristiques_couleur']['hue_std'],
                    'has_saturation_mean' => $data['caracteristiques_couleur']['saturation_mean'],
                    'has_saturation_std' => $data['caracteristiques_couleur']['saturation_std'],
                    'has_value_mean' => $data['caracteristiques_couleur']['value_mean'],
                    'has_value_std' => $data['caracteristiques_couleur']['value_std'],
                    'image_id' => $uploadedImage->id,
                ]);

                $uploadedImage->texture()->create([
                    'label' => $this->label,
                    'description' => 'Description de la texture', // Remplacez par la description réelle si disponible
                    'has_contrast' => $data['caracteristiques_texture']['contrast'],
                    'has_dissimilarity' => $data['caracteristiques_texture']['dissimilarity'],
                    'has_energy' => $data['caracteristiques_texture']['energy'],
                    'has_homogeneity' => $data['caracteristiques_texture']['homogeneity'],
                    'has_correlation' => $data['caracteristiques_texture']['correlation'],
                    'image_id' => $uploadedImage->id,
                ]);

                // Ajouter à la liste des images téléchargées
                $this->uploadedImages[] = $uploadedImage;

                // Mettre à jour l'ontologie principale avec owl_base64
                $this->updateMainOntologie($data['owl_base64']);

            } catch (\Exception $e) {
                // Gérer les erreurs de requête vers l'API Flask
                throw new \Exception('Erreur lors de la requête vers l\'API Flask : ' . $e->getMessage());
            }
        }

        // Mettre à jour les attributs de la classe
        $this->updateClasseAttributes();
    }

    private function updateMainOntologie($owlBase64)
    {
        // Décoder la chaîne base64
        $owlBinary = base64_decode($owlBase64);

        // Enregistrez l'ontologie mise à jour dans votre système de fichiers
        $fileName = 'mainOntologie_OK.owl';
        Storage::put('ontologie/' . $fileName, $owlBinary);

        // Obtenir le chemin complet du fichier stocké
        $fullPath = Storage::path('ontologie/' . $fileName);

        // Stocker le chemin complet dans une variable d'instance
        $this->ontologie->new_path_ontologie = $fullPath;
    }

    public function removeImage($index)
    {
        $image = $this->uploadedImages[$index];
        Storage::disk('public')->delete($image->path);

        // Supprimer l'image de la base de données
        Image::destroy($image->id);

        unset($this->uploadedImages[$index]);
        $this->uploadedImages = array_values($this->uploadedImages); // Réindexer le tableau

        // Mettre à jour les attributs de la classe
        $this->updateClasseAttributes();
    }

    private function updateClasseAttributes()
    {
        $totalSize = Image::where('classe_id', $this->classe->id)->sum('has_img_size');
        $imagesCount = Image::where('classe_id', $this->classe->id)->count();

        $this->classe->update([
            'size_in_mo' => $totalSize,
            'images_count' => $imagesCount,
        ]);

        $this->classe->save();
    }

    public function completeAnnotation()
    {
        return redirect()->route('annotation-index', ['idOntologie' => $this->ontologie->id])->with('success', 'Annotation terminer avec succès !!!'); // Ajustez la route selon vos besoins
    }

    public function retour()
    {
        return redirect()->route('annotation-index', ['idOntologie' => $this->ontologie->id]); // Ajustez la route selon vos besoins
    }

    public function render()
    {
        return view('livewire.private.annotation.image-annotation');
    }
}
