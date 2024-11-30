<?php 

namespace App\Services\Strategies;

use App\Services\Strategies\JournalStrategy;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class  LEquipeStrategy implements JournalStrategy
{
    public function getTodayArticles()
    {
        try {
            $date = now()->format('Y-m-d');
            //$url = "https://api-catch-the-dev.unit41.fr/lemonde?date={$date}";
            $url = "https://api-catch-the-dev.unit41.fr/lemonde?date=2024-11-29";
            // Récupération des articles
            $response = Http::get($url);

            if ($response->successful()) {
                $articles = $response->json();

                // Vérifier si les articles existent dans la réponse
                if (isset($articles['data']) && is_array($articles['data']) &&! empty($articles['data'])) {
                    return response()->json($articles['data'], 200);
                }
                 else
                {
                    return response()->json(['error' => 'Aucun article trouvé pour aujourd\'hui.'], 404);
                }
                
            } else {
                // Journalisation de l'erreur
                Log::error('Erreur lors de la récupération des articles de Le Monde', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                return response()->json(['error' => 'Erreur lors de la récupération des articles', 'status' => $response->status()], 500);
            }
        } catch (\Exception $e) {
           
            Log::error('Erreur interne lors de la récupération des articles de Le Monde', [
                'message' => $e->getMessage()
            ]);

            return response()->json(['error' => 'Erreur interne : ' . $e->getMessage()], 500);
        }
    }
}
