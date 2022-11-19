<?php 

/**
 * 
 * Routes that are protected
 * from outside access. 
 * 
 */

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/profile/{user}', [UserController::class, 'view']);
Route::get('/users/update/{user}', [UserController::class, 'edit'])->name('update');
Route::get('/files/download/{file}', [FileController::class, 'download']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/notifications/clear', [NotificationController::class, 'delete'])->name('clear');

Route::post('/upload', [FileController::class, 'create']);
Route::post('/users/update', [UserController::class, 'update']);

/** Allow specific routes just for admins */
Route::middleware(['admin'])->group(function(){
    Route::get('/users/new', [UserController::class, 'create'])->name('new');
    Route::post('/users/new', [SignupController::class, 'create']);
    Route::get('/users/remove/{user}', [UserController::class, 'delete']);
    Route::get('/upload/{user}', [FileController::class, 'index'])->name('upload');
    Route::get('/files/remove/{file}', [FileController::class, 'remove']);
});