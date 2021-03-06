<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomepageController;


use Illuminate\Support\Facades\URL;

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

Route::middleware(['auth'])->group(function() {
    // profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // create a new route
    Route::get('/routes/new', [RouteController::class, 'create'])->name('route.create');
    Route::post('/routes', [RouteController::class, 'store'])->name('route.store');

    // edit a route
    Route::get('/routes/{id}/edit', [RouteController::class, 'edit'])->name('route.edit');
    Route::post('/routes/{id}', [RouteController::class, 'update'])->name('route.update');

    // display community
    Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
    // specific user
    Route::get('/community/{id}/show', [CommunityController::class, 'show'])->name('community.show');

    // delete a route
    Route::get('/routes/{id}/delete', [RouteController::class, 'delete'])->name('route.delete');
    Route::post('/routes/{id}/delete', [RouteController::class, 'destroy'])->name('route.destroy');

    // store a comment
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    // delete a comment
    Route::post('/comment/{id}/{routeID}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');
    // edit a comment
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');

    // store a favorite route
    Route::post('/route/favorite', [FavoriteController::class, 'store'])->name('favorite.store');
    // delete a favorite route
    Route::post('/route/favorite/{id}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
});

// homepage
Route::get('/mybikeroute', [HomepageController::class ,'index'])->name('homepage.index');

// display all the routes
Route::get('/routes', [RouteController::class, 'index'])->name('route.index');
// show the specific route info
Route::get('/routes/{id}/show', [RouteController::class, 'show'])->name('route.show');

// register
Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');

// login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}