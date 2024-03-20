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
        $nombreArticles = $request->input('nombreArticles', session('nombreArticles', 5));
        session(['nombreArticles' => $nombreArticles]);

        $articles = Article::paginate($nombreArticles);

        return view('welcome', ['articles' => $articles, 'numArt' => $nombreArticles]);
    }


    public function showDashboard(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $userId = auth()->id();
        $numArticles = $request->input('nombreArticles', session('nombreArticles', 10)); // Usa el valor del parámetro de consulta o el valor de la sesión

        session(['nombreArticles' => $numArticles]);

        $articles = Article::where('user_id', $userId)->paginate($numArticles);

        return view('dashboard', ['articles' => $articles, 'numArt' => $numArticles]);
    }
    public function edit(Article $article): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('articles.edit', ['article' => $article]);

    }

    public function destroy(Article $article): \Illuminate\Http\RedirectResponse
    {
        $article->delete();
        return redirect()->route('dashboard');
    }
}
