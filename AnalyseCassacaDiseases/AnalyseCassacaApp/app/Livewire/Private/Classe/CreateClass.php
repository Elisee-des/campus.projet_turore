<?php

namespace App\Livewire\Private\Classe;

use App\Models\Classe;
use App\Models\Dataset;
use App\Models\Ontologie;
use Livewire\Component;

class CreateClass extends Component
{
        public $label;
        public $description;
        public $has_name;
        public $dataset_id;
    
        public function mount()
        {
            // Récupérer l'ontologie pour extraire les données 'label' et 'description'
            $ontologie = Ontologie::first(); // Ajustez cela selon votre logique
            $data = json_decode($ontologie->data, true);
    
            // Si les données de l'ontologie contiennent les informations de la classe
            if (isset($data['http://www.example.org/cassacadiseases.owl#Classe'])) {
                $this->label = $data['http://www.example.org/cassacadiseases.owl#Classe']['label'];
                $this->description = $data['http://www.example.org/cassacadiseases.owl#Classe']['comment'];
            }
    
            // Récupérer le dataset_id lié à l'ontologie
            $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();
            $this->dataset_id = $dataset ? $dataset->id : null;
        }
    
        public function render()
        {
            $datasets = Dataset::all();
            return view('livewire.private.classe.create-class', compact('datasets'));

        }
    
        public function submit()
        {
            $validatedData = $this->validate([
                'label' => 'required',
                'description' => 'nullable',
                'has_name' => 'nullable',
                'dataset_id' => 'required|exists:datasets,id',
            ]);
    
            $classe = new Classe();
            $classe->label = $this->label;
            $classe->description = $this->description;
            $classe->has_name = $validatedData['has_name'];
            $classe->dataset_id = $validatedData['dataset_id'];
            $classe->save();
    
            $this->reset(['label', 'description', 'has_name', 'dataset_id']);
    
            session()->flash('message', 'Classe créée avec succès!');
    
            // Rafraîchir la vue Livewire
            $this->emit('refreshParent');
        }
    }


