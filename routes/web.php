<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Middleware\OnlyFirstCanSignupMiddleware;
use App\Http\Middleware\PreventDoubleLogin;
use Illuminate\Support\Facades\Route;

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
Route::middleware([PreventDoubleLogin::class])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

/**
 * Signup is allowed only for
 * first user who visit the website.
 * He will get administrator role and everybody
 * else should be added trough admin new-user
 */
Route::middleware([OnlyFirstCanSignupMiddleware::class])->group(function(){
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/signup', [SignupController::class, 'create']);
});