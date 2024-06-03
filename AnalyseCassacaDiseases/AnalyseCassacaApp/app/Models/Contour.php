<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contour extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'label',
        'description',
        'has_area',
        'has_perimeter',
        'has_width',
        'has_height',
        'has_normalized_area',
        'has_normalized_perimeter',
        'has_aspect_ratio',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
