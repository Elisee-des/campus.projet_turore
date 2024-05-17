<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function parametreAccueil()
    {
        return view('private.parametre.index');
    }
}
