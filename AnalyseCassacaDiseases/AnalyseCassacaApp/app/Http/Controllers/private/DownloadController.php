<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadOntologie()
    {
        $zipFileName = 'ontologie.zip';
        $zipFilePath = storage_path($zipFileName);

        $zip = new ZipArchive;
        
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $this->addFolderToZip(storage_path('app/public/ontologie'), $zip);
            $zip->close();
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    public function downloadClasse($classeId)
    {
        // Récupérer la classe par son ID
        $classe = Classe::findOrFail($classeId);

        // Chemin vers le dossier contenant les images de la classe
        $folderPath = storage_path("app/public/ontologie/{$classe->dataset->ontologie->nom}/{$classe->has_name}");

        // Nom et chemin du fichier zip à créer
        $zipFileName = "{$classe->has_name}.zip";
        $zipFilePath = storage_path($zipFileName);

        // Création du fichier zip
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $this->addFolderToZip($folderPath, $zip);
            $zip->close();
        }

        // Retourner le fichier zip en réponse
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }

    private function addFolderToZip($folder, &$zip, $parentFolder = '')
    {
        $files = scandir($folder);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filePath = $folder . DIRECTORY_SEPARATOR . $file;
            $relativePath = $parentFolder ? $parentFolder . DIRECTORY_SEPARATOR . $file : $file;
            if (is_dir($filePath)) {
                $zip->addEmptyDir($relativePath);
                $this->addFolderToZip($filePath, $zip, $relativePath);
            } else {
                $zip->addFile($filePath, $relativePath);
            }
        }
    }


}
