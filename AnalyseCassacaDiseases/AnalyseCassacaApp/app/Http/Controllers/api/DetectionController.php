<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetectionController extends Controller
{
    public function detect(Request $request)
    {
        $imageBase64 = $request->input('image');

        $response = Http::post('http://localhost:5000/predict', [
            'image' => $imageBase64,
        ]);

        return $response->json();
    }
}
