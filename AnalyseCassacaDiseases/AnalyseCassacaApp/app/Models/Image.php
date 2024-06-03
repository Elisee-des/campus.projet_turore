<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'nom',
        'path',
        'has_img_size',
        'dataset_id',
        'label',
        'description',
    ];

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function contours()
    {
        return $this->hasMany(Contour::class);
    }

    public function couleurs()
    {
        return $this->hasMany(Couleur::class);
    }

    public function textures()
    {
        return $this->hasMany(Texture::class);
    }
}
