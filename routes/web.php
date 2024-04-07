<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/about', function () {
    return view('about');
});
Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index');

Route::get('/', [ArticleController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'showDashboard'])->name('dashboard');
});
// Grup de rutes protegides per un middleware d'autenticació. Només els usuaris autenticats poden accedir a aquestes rutes.
Route::middleware('auth')->group(function () {
    // Rutes per a la gestió del perfil d'usuari
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Mostra el formulari d'edició del perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Actualitza el perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Elimina el perfil de l'usuari

    // Rutes per a la gestió d'articles
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Mostra el formulari per crear un nou article
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); // Actualitza un article específic
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); // Mostra el formulari d'edició per a un article específic
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); // Elimina un article específic
});

// Rutes per a la visualització i creació d'articles accessibles sense autenticació
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); // Llista tots els articles
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store'); // Guarda un nou article


// Ruta per iniciar el procés d'autenticació amb Google
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('/login-google');


// Ruta de callback per l'autenticació amb Google; gestiona la lògica post-autenticació
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

    if ($userExists) {
        auth()->login($userExists);
    } else {
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'external_id' => $user->id,
                'external_auth' => 'google',
            ]);
            auth()->login($newUser);
        }
    }

    return redirect()->route('dashboard');
});

// Ruta per iniciar el procés d'autenticació amb GitHub
Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
})->name('/login-github');

// Ruta de callback per l'autenticació amb GitHub; gestiona la lògica post-autenticació similar a la de Google
Route::get('/github-callback', function () {
    $user = Socialite::driver('github')->user();
    $userExists = User::where('external_id', $user->id)->where('external_auth', 'github')->first();

    $existingUser = User::where('email', $user->email)->first();
    if ($existingUser) {
        if ($userExists) {
            auth()->login($userExists);
        } else {
            $existingUser->external_id = $user->id;
            $existingUser->external_auth = 'github';
            $existingUser->save();

            auth()->login($existingUser);
        }
    } else if ($userExists) {
        auth()->login($userExists);
    } else {
        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'external_id' => $user->id,
            'external_auth' => 'github',
        ]);
        auth()->login($newUser);
    }

    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';
