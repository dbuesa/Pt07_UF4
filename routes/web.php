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
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');


Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('/login-google');

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

require __DIR__.'/auth.php';
