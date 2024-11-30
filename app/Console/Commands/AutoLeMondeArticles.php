<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Services\Strategies\LeMondeStrategy;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoLeMondeArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-le-monde-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $strategy = new LeMondeStrategy();
            $articles = $strategy->getTodayArticles()->getData();
            $articles = json_decode(json_encode($articles), true); // Convertir les objets en tableaux

            foreach ($articles as $article) {
                Article::updateOrCreate(
                    ['title' => $article['title'], 'published_at' => $article['published_at']],
                    [
                        'author' => $article['author'],
                        'category' => $article['category'],
                        'content' => $article['content'],
                        'source' => 'Le Monde',
                        'journal_id' => 2,
                    ]
                );
                Log::info('Article enregistré ou mis à jour', ['title' => $article['title'], 'published_at' => $article['published_at']]);
            }

            $this->info('Les articles du journal Le Monde ont été récupérés et enregistrés avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des articles', ['error' => $e->getMessage()]);
            $this->error('Erreur lors de la récupération des articles : ' . $e->getMessage());
        }
    }
}
