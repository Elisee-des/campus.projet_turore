<?php

use App\Http\Controllers\private\AnalyseController;
use App\Http\Controllers\private\OntologieController;
use App\Http\Controllers\private\TableaudebordController;
use App\Http\Controllers\private\BankImageController;
use App\Http\Controllers\private\UserController;
use App\Http\Controllers\private\ParametreController;
use App\Http\Controllers\public\AuthController;
use App\Livewire\Private\Ontologie\AjoutOntologie;
use App\Livewire\Public\Connexion;
use App\Livewire\Public\Logout;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'connexion'])->name('connexion');
Route::get('/connexion-action', [Connexion::class]);

Route::middleware(['auth'])->group(function () {
    Route::get('/tableau-de-bord', [TableaudebordController::class, 'index'])->name('tableaudebord');
    Route::resource('ontologies', OntologieController::class);
    Route::post('/ontologies-store', [AjoutOntologie::class]);
    Route::resource('analyses', AnalyseController::class);
    Route::resource('bankimages', BankImageController::class);
    Route::resource('users', UserController::class);
    Route::get('/parametre', [ParametreController::class, 'parametreAccueil'])->name('parametre-index');
    Route::post('/deconnecion', [Logout::class, 'logout'])->name('logout');
});