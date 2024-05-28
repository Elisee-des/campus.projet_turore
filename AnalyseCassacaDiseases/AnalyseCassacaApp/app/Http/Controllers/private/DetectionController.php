<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetectionController extends Controller
{
    public function index()
    {
        return view('private.detection.index');
    }

    public function index1()
    {
        return view('private.detection.index-1');
    }


        public function index2()
    {
        return view('private.detection.index-2');
    }
}
