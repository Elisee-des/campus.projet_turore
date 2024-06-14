<?php

namespace App\Http\Controllers\api\private;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getImageDetails($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        return response()->json($image);
    }
}