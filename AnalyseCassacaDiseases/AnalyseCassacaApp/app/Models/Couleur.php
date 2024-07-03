<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'label',
        'description',
        'has_hue_mean',
        'has_hue_std',
        'has_saturation_mean',
        'has_saturation_std',
        'has_value_mean',
        'has_value_std',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
