<?php
namespace App\Livewire\Private\Annotation;

use App\Models\Dataset;
use App\Models\Image;
use App\Models\Classe;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class ImageAnnotation extends Component
{
    use WithFileUploads;

    public $images = [];
    public $uploadedImages = [];
    public $ontologie;
    public $classe;

    public function mount($ontologie, $classe)
    {
        $this->ontologie = $ontologie;
        $this->classe = $classe;
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);

        // Réinitialiser la liste des images téléchargées
        $this->uploadedImages = [];

        // Ajouter les nouvelles images chargées et les stocker en base de données
        foreach ($this->images as $image) {
            $path = $image->store('uploads', 'public');
            $size = $image->getSize() / (1024 * 1024); // Taille en Mo

            // Stocker l'image en base de données
            $uploadedImage = Image::create([
                'nom' => $image->getClientOriginalName(),
                'path' => $path,
                'has_img_size' => $size,
                'classe_id' => $this->classe->id,
            ]);

            $this->uploadedImages[] = $uploadedImage;
        }

        // Limiter à 20 images maximum
        if (count($this->uploadedImages) > 20) {
            $this->uploadedImages = array_slice($this->uploadedImages, 0, 20);
        }

        // Mettre à jour les attributs de la classe
        $this->updateClasseAttributes();
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
