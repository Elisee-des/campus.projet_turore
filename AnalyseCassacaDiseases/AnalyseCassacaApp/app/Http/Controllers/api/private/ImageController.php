<?php

namespace App\Http\Controllers\api\private;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getImageDetails($id)
    {
        try {
            $image = Image::with('classe', 'contour', 'couleur', 'texture')->find($id);

        if (!$image) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        return response()->json(['image' => $image], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}