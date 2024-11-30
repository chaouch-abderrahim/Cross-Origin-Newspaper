<?php
namespace App\Services;

use App\Services\Strategies\JournalStrategy;

class ArticleService
{
    private $strategy;

    public function __construct(JournalStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getTodayArticles()
    {
        return $this->strategy->getTodayArticles();
    }
}
