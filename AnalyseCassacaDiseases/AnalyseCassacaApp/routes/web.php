<?php

use App\Http\Controllers\private\AnalyseController;
use App\Http\Controllers\private\OntologieController;
use App\Http\Controllers\private\TableaudebordController;
use App\Http\Controllers\private\BankImageController;
use App\Http\Controllers\private\ParametreController;
use App\Http\Controllers\public\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/tableau-de-bord', [TableaudebordController::class, 'index'])->name('tableaudebord');
Route::get('/connexion', [AuthController::class, 'connexion'])->name('connexion');
Route::resource('ontologies', OntologieController::class);
Route::resource('analyses', AnalyseController::class);
Route::resource('bankimages', BankImageController::class);
Route::get('/parametre-index', [ParametreController::class, 'parametreAccueil'])->name('parametre-index');
