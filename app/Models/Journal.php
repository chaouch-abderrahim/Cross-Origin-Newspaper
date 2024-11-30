<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    
    
     
    protected $fillable = [
        'name',
        'website',
    ];

    // Un journal peut avoir plusieurs articles.
     
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
        
    //Les fonctions d'ajout, de suppression et de modification sont disponibles par défaut car le modèle hérite d'Eloquent.

}
