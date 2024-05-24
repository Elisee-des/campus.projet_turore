<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Ontologie extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'nom',
        'description',
        'categorie',
        'photo',
        'status',
        'fichier_owl',
        'auteur_nom_prenom',
        'auteur_email',
        'auteur_telephone',
        'auteur_photo',
    ];
}
