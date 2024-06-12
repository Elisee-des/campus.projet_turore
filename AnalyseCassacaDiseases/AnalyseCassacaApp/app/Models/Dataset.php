<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'nom',
        'creation_date',
        'has_url',
        'has_size',
        'has_author',
        'label',
        'description',
        'has_creation_date',
        'ontologie_id',
    ];

    public function ontologie()
    {
        return $this->belongsTo(Ontologie::class, 'ontologie_id');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
    
}
