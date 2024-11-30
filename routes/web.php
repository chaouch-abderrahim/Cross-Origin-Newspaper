<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LeMondeController;
use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('welcome');
    });
   // Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); //pour affichier les articles  vient de la base de donnée 
    Route::get('/journals', [JournalController::class, 'index'])->name('journals.index');
    Route::get('/articles', [ArticleController::class, 'ArticlesLeMonde']);
