<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ArticleController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        Paginator::useBootstrapFour();
        $nombreArticles = $request->input('nombreArticles', 5);
        $articles = Article::paginate($nombreArticles);

        return view('welcome', ['articles' => $articles, 'numArt' => $nombreArticles]);
    }
}
