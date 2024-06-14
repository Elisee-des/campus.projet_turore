<?php

namespace App\Http\Controllers\api\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Retourne toutes les classes
    public function getCategories()
    {
        try {
            $classes = Classe::all();
            return response()->json(['classes' => $classes], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    // Retourne les images associées à une classe spécifique
    public function getCategoryImagesByName($name)
    {
        try {
            // Trouver la classe (catégorie) par son nom
            $category = Classe::where('has_name', $name)->first();

            if (!$category) {
                return response()->json(['error' => 'Classe not found'], 404);
            }

            // Récupérer les images pour cette catégorie
            $images = Image::where('classe_id', $category->id)->get();
            return response()->json(['images' => $images], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
