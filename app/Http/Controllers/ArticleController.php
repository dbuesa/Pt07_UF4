<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all(); // Recupera todos los artículos
        return view('welcome', ['articles' => $articles]); // Pasa los artículos a la vista
    }
}
