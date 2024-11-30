<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'author', 'content'];

    // Définir la relation avec l'article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
