<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        
        Comment::create([
            'article_id' => $validated['article_id'],
            'author' => $validated['author'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('articles.index')->with('success', 'Commentaire ajouté avec succès.');
    }
}

