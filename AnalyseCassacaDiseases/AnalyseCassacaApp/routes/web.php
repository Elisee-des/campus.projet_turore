<?php

use App\Http\Controllers\private\AnalyseController;
use App\Http\Controllers\private\AnnotationController;
use App\Http\Controllers\private\OntologieController;
use App\Http\Controllers\private\TableaudebordController;
use App\Http\Controllers\private\BankImageController;
use App\Http\Controllers\private\ClasseController;
use App\Http\Controllers\private\DetectionController;
use App\Http\Controllers\private\DownloadController;
use App\Http\Controllers\private\UserController;
use App\Http\Controllers\private\ParametreController;
use App\Http\Controllers\public\AuthController;
use App\Livewire\Private\Annotation\ImageAnnotation;
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
    Route::resource('classes', ClasseController::class);
    Route::resource('bankimages', BankImageController::class);
    Route::resource('users', UserController::class); 
    Route::get('/classes/{idOntologie}/create', [ClasseController::class, 'indexCreate'])->name('classes-create');
    Route::post('/classes/{idOntologie}/create/action', [ClasseController::class, 'indexCreateAction'])->name('classes-create-action');
    Route::get('/annotation-etape-1/{idOntologie}', [AnnotationController::class, 'index'])->name('annotation-index');
    Route::post('/annotation-etape-1/{idOntologie}/action', [AnnotationController::class, 'indexAction'])->name('annotation-index-action');
    Route::get('/annotation-etape-2/{idOntologie}/{idDataset}/{idClasse}', [AnnotationController::class, 'index2'])->name('annotation-index2');
    Route::get('/image-annotation', ImageAnnotation::class);
    Route::get('/parametre', [ParametreController::class, 'parametreAccueil'])->name('parametre-index');
    Route::get('/detection', [DetectionController::class, 'index'])->name('detection.index');
    Route::get('/detection-1', [DetectionController::class, 'index1'])->name('detection.index1');
    Route::get('/detection-2', [DetectionController::class, 'index2'])->name('detection.index2');
    Route::get('/download-ontologie', [DownloadController::class, 'downloadOntologie'])->name('download-ontologie');

    Route::post('/deconnecion', [Logout::class, 'logout'])->name('logout');
});