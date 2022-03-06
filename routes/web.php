<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;



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

// display the routes
Route::get('/routes', [RouteController::class, 'index'])->name('route.index');
// show the specific route info
Route::get('/routes/{id}/show', [RouteController::class, 'show'])->name('route.show');
// create a new route
Route::get('/routes/new', [RouteController::class, 'create'])->name('route.create');
Route::post('/routes', [RouteController::class, 'store'])->name('route.store');
// edit a route
Route::get('/routes/{id}/edit', [RouteController::class, 'edit'])->name('route.edit');
Route::post('/routes/{id}', [RouteController::class, 'update'])->name('route.update');

// register
Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');

// login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}