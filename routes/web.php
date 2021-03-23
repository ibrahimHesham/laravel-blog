<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/page/{page}', [PostController::class,'paginate'])->name('posts.paginate')->middleware('auth');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('provider_id', $githubUser->getId())->first();
    //$provId=strval($githubUser->id);
    //dd($provId);
    if (! $user) {
        $user = User::create([
            'email'=> $githubUser->getEmail(),
            'name'=> $githubUser->getName(),
            'provider_id'=> $githubUser->id
        ]);
    }

    auth()->login($user, true);
    return redirect()->route('posts.index');

    // if ($authUser = User::where('github_id', $user->id)->first()) {
    //     return $authUser;
    // }

    //dd($user);
    // $user->token
});
