<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;

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

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('media', MediaController::class, [
        'except' => ['destroy', 'show']
    ]);
Route::get('media/{media}', [MediaController::class, 'show'])->name('media.show');
Route::delete('media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
    