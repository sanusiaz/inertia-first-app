<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Home');
});


// Auth Routes
Route::get('/login', [LoginController::class, 'index'])
    ->name('user.login');

Route::get('/register', [RegisterController::class, 'index'])
    ->name('user.register');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', LogoutController::class);
Route::get('/forget-password', [ForgetPasswordController::class, 'index']);




// Post Route

Route::resource('posts', PostController::class);
