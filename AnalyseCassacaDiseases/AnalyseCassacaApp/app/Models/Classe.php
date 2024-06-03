<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'nom',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
