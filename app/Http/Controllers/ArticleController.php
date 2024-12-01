<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use App\Services\Strategies\LeMondeStrategy;
use App\Services\Strategies\LEquipeStrategy;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   
    //pour affichier les donnees de la base de donnée 
    public function index()
    {
        $articles = Article::all(); 
        return view('dashboard', compact('articles')); 
    }
   //// Pour afficher les données de la base de données
 
    public function indexJson()
    {
        $articles = Article::all(); 
        return response()->json($articles); 
    }

    // pour afficher les données à partir des API

    public function ArticlesLeMonde()
    {
        try {
            $strategy = new LeMondeStrategy();
            $service = new ArticleService($strategy);
            $articles = $service->getTodayArticles()->getData(); // Récupère les données JSON en tableau
            $articlesLeMonde = collect($articles)->sortByDesc('published_at');
              // Passer les articles à la vue
            return view('dashboard', compact('articlesLeMonde')); 
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }
    public function ArticlesLeMondJson()
    {
        try {
            $strategy = new LeMondeStrategy();
            $service = new ArticleService($strategy);
            $articles = $service->getTodayArticles();
            return response()->json($articles,$articles->status());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }

  // Je n'ai pas réussi à récupérer les données
    public function ArticlesLEquipe()
    {
        $strategy = new LEquipeStrategy();
        $service = new ArticleService($strategy);
        $articles = $service->getTodayArticles();
        return null;
    }
}

