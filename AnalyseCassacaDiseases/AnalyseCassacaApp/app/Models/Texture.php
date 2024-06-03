<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texture extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'label',
        'description',
        'has_contrast',
        'has_dissimilarity',
        'has_energy',
        'has_homogeneity',
        'has_correlation',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
