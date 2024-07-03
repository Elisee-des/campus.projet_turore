<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'label',
        'sigle',
        'description',
        'path',
        'has_name',
        'images_count',
        'cause',
        'symtome',
        'traitement',
        'size_in_mo',
        'dataset_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }
}
