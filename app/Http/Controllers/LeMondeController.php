<?php

namespace App\Http\Controllers;

use App\Services\LeMondeService;

class LeMondeController extends Controller
{
    protected $leMondeService;

    public function __construct(LeMondeService $leMondeService)
    {
        $this->leMondeService = $leMondeService;
    }
    public function todayArticles()
    {
        try {
            // Récupérer les articles du jour sous forme d'un objet 
            $articlesLeMonde = $this->leMondeService->getTodayArticles()->getData();

            // Passer les articles à la vue
            return view('articles.index', compact('articlesLeMonde')); 
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }

    public function todayArticlesJson()
    {
        try {
            $articles = $this->leMondeService->getTodayArticles();
            return response()->json($articles,$articles->status());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }
}


