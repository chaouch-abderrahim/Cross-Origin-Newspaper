<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    
    //  Les champs qui peuvent être remplis via une requête.
     
    protected $fillable = [
        'title',
        'author',
        'publication_date',
        'category',
        'content',
        'journal_id',
    ];

    
    //  Un article appartient à un journal.
     
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
    //Les fonctions d'ajout, de suppression et de modification sont disponibles par défaut car le modèle hérite d'Eloquent.
}
