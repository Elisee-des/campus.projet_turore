<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableaudebordController extends Controller
{
    public function index()
    {
        return view('private.tableaudebord.index');
    }
}
