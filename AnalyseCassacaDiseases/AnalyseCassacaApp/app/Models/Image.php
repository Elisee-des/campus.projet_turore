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
        'classe_id',
        'label',
        'description',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function contour()
    {
        return $this->hasOne(Contour::class);
    }

    public function couleur()
    {
        return $this->hasOne(Couleur::class);
    }

    public function texture()
    {
        return $this->hasOne(Texture::class);
    }
}
