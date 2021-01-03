<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('MusiCloud/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/folders', [App\Http\Controllers\FolderController::class, 'index'])->name('folder.index');
Route::post('/folder', [App\Http\Controllers\FolderController::class, 'store'])->name('folder.store');
Route::get('/folder/{id}', [App\Http\Controllers\FolderController::class, 'show'])->name('folder.show');
Route::delete('/folder/{id}', [App\Http\Controllers\FolderController::class, 'destroy'])->name('folder.destroy');

Route::post('/music', [App\Http\Controllers\MusicController::class, 'store'])->name('music.store');
Route::delete('/music/{id}', [App\Http\Controllers\MusicController::class, 'destroy'])->name('music.destroy');
Route::get('/music/{id}/download' ,  [App\Http\Controllers\MusicController::class, 'download'])->name('music.download');


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('MusiCloud/home');
})->name('homes');
