<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Project\AssetController;
use App\Http\Controllers\Project\ShotController;
use App\Http\Controllers\Project\TeamController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/edit-profile', [ProfileController::class, 'editProfile'])->middleware('auth');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->middleware('auth');

Route::resource('/', DashboardController::class)->middleware('auth');

Route::resource('/project', ProjectController::class)->middleware('auth');

Route::post('/project-asset', [AssetController::class, 'store'])->middleware('auth');
Route::put('/project-asset/{id}', [AssetController::class, 'update'])->middleware('auth');
Route::delete('/project-asset/{id}', [AssetController::class, 'destroy'])->middleware('auth');

Route::post('/project-shot-episode', [ShotController::class, 'addEpisodes'])->middleware('auth');
Route::delete('/project-shot-episode/{id}', [ShotController::class, 'destroyEpisode'])->middleware('auth');

Route::post('/project-shot-sequence', [ShotController::class, 'addSequences'])->middleware('auth');
Route::delete('/project-shot-sequence/{id}', [ShotController::class, 'destroySequence'])->middleware('auth');

Route::post('/project-shot', [ShotController::class, 'addShots'])->middleware('auth');
Route::put('/project-shot/{id}', [ShotController::class, 'updateShot'])->middleware('auth');
Route::delete('/project-shot/{id}', [ShotController::class, 'destroyShot'])->middleware('auth');

Route::post('/project-team', [TeamController::class, 'store'])->middleware('auth');
Route::delete('/project-team/{id}', [TeamController::class, 'destroy'])->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/history', HistoryController::class)->middleware('auth');