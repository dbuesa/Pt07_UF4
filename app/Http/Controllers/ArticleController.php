<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class ArticleController extends Controller
{

    /**
     * Funció que retorna la vista principal de la pàgina d'inici
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|Factory|Application vista principal de la pàgina d'inici
     */
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        Paginator::useBootstrapFour();
        $nombreArticles = $request->input('nombreArticles', session('nombreArticles', 5));
        session(['nombreArticles' => $nombreArticles]);

        $articles = Article::paginate($nombreArticles);

        return view('welcome', ['articles' => $articles, 'numArt' => $nombreArticles]);
    }


    /**
     * Funció que retorna la vista del dashboard de l'usuari
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|Factory|Application vista del dashboard de l'usuari
     */
    public function showDashboard(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $userId = auth()->id();
        $numArticles = $request->input('nombreArticles', session('nombreArticles', 10)); // Usa el valor del parámetro de consulta o el valor de la sesión

        session(['nombreArticles' => $numArticles]);

        $articles = Article::where('user_id', $userId)->paginate($numArticles);

        return view('dashboard', ['articles' => $articles, 'numArt' => $numArticles]);
    }

    /**
     * Funció que retorna la vista d'edició d'un article
     * @param Article $article article a editar
     * @return View|\Illuminate\Foundation\Application|Factory|Application vista d'edició d'un article
     */
    public function edit(Article $article): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('articles.edit', ['article' => $article]);

    }

    /**
     * Funció que elimina un article de la base de dades
     * @param Article $article article a eliminar
     * @return RedirectResponse ruta a la pàgina de dashboard
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('dashboard');
    }

    /**
     * Funció que retorna la vista de creació d'un article
     * @return View|\Illuminate\Foundation\Application|Factory|Application vista de creació d'un article
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('articles.create');
    }

    /**
     * Funció que crea un article a la base de dades a partir de la descripció rebuda
     * @param Request $request
     * @return RedirectResponse ruta a la pàgina de dashboard
     */
    public function store(Request $request): RedirectResponse
    {
        $article = new Article;
        $article->descripcio = $request->description;
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->route('dashboard');
    }

    /**
     * Funció que actualitza un article a la base de dades a partir de la descripció rebuda
     * @param Request $request
     * @param Article $article article a actualitzar
     * @return RedirectResponse ruta a la pàgina de dashboard
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->descripcio = $request->description;
        $article->save();

        return redirect()->route('dashboard');
    }
}
