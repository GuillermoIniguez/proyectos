<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInterestsController;
use App\Http\Controllers\AdminController;

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

Route::get('/old', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [PanelController::class, 'index'])->name('admin');
Route::get('/admin/matches', [MatchesController::class, 'index'])->name('matches');

Route::get('/admin/matche/edit/{id}', [MatchesController::class, 'edit'])->name('matche-edit');
Route::put('/admin/matche/update/{id}', [MatchesController::class, 'update'])->name('matche-update');
Route::post('/admin/matche/store', [MatchesController::class, 'store'])->name('matche-store');
Route::delete('/admin/matche/delete/{id}', [MatchesController::class, 'destroy'])->name('matche-destroy');

Route::get('/admin/interests', [InterestController::class, 'index'])->name('interests');
Route::post('/admin/interests/store', [InterestController::class, 'store'])->name('interests.store');
Route::get('/admin/interests/{id}/edit', [InterestController::class, 'edit'])->name('interests.edit');
Route::put('/admin/interests/{id}/update', [InterestController::class, 'update'])->name('interests.update');
Route::delete('/admin/interests/{id}/delete', [InterestController::class, 'destroy'])->name('interests.destroy');



Route::get('/admin/users', [UserController::class, 'index'])->name('users');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.store'); 
Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update'); 
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/admin/userinterests', [UserInterestsController::class, 'index'])->name('userinterests');
Route::get('/admin/userinterests/{id}/edit', [UserInterestsController::class, 'edit'])->name('userinterests.edit');
Route::post('/admin/userinterests/store', [UserInterestsController::class, 'store'])->name('userinterests.store');
Route::put('/admin/userinterests/update/{id}', [UserInterestsController::class, 'update'])->name('userinterests.update');
Route::delete('/admin/userinterests/delete/{id}', [UserInterestsController::class, 'destroy'])->name('userinterests.destroy');



// En web.php
Route::get('/search', [PanelController::class, 'search'])->name('search');

Route::put('/admin/{id}', [AdminController::class, 'update'])->name('editar-usuario');
Route::get('/config', [PanelController::class, 'config'])->name('config');







