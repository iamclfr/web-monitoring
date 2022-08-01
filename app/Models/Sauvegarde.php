<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauvegarde extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function domaines()
    {
        return $this->belongsTo(Domaine::class, 'domaine_id');
    }
}
