<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Dataset;
use App\Models\Ontologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnotationController extends Controller
{
    public function index($idOntologie)
    {
        $ontologie = Ontologie::find($idOntologie);
        $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();
        $classes = $dataset ? $dataset->classes : collect();  
        return view('private.annotation.index', compact('ontologie', 'dataset', 'classes'));
    }

    public function indexAction(Request $request, $idOntologie)
    {
        $ontologie = Ontologie::find($idOntologie);
        $dataset = Dataset::where('ontologie_id', $ontologie->id)->first();
        $classe = Classe::find($request->classe_id);

        return redirect()->route('annotation-index2', [
            "idOntologie"=>$ontologie->id,
            "idDataset"=>$dataset->id,
            "idClasse"=>$classe->id,
        ]);
    }

    public function index2($idOntologie, $idDataset, $idClasse)
    {
        $ontologie = Ontologie::find($idOntologie);
        $dataset = Dataset::find($idDataset);
        $classe = Classe::find($idClasse);

        return view('private.annotation.index2', [
            "ontologie"=>$ontologie,
            "dataset"=>$dataset,
            "classe"=>$classe,
        ]);
    }

}
