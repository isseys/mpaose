<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CatController;
use \App\Http\Controllers\BreedController;
use \App\Http\Controllers\BodyController;
use \App\Http\Controllers\CoatController;
use \App\Http\Controllers\OriginController;
use \App\Http\Controllers\PatternController;
use \App\Http\Controllers\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search/cat', [CatController::class, 'search'])->name('searchcats');

// show all recods
Route::get('/cats', [CatController::class, 'index'])->name('cats');
Route::get('/breeds', [BreedController::class, 'index'])->name('breeds');
Route::get('/bodies', [BodyController::class, 'index'])->name('bodies');
Route::get('/coats', [CoatController::class, 'index'])->name('coats');
Route::get('/origins', [OriginController::class, 'index'])->name('origins');
Route::get('/types', [TypeController::class, 'index'])->name('types');
Route::get('/patterns', [PatternController::class, 'index'])->name('types');
Route::get('/cats/pattern/{pattern}', [CatController::class, 'pattern'])->name('cats-patterns');
Route::get('/cats/body/{body}', [CatController::class, 'body'])->name('cats-bodys');
Route::get('/cats/breed/{breed}', [CatController::class, 'breed'])->name('cats-breeds');
Route::get('/cats/coat/{coat}', [CatController::class, 'coat'])->name('cats-coats');
Route::get('/cats/origin/{origin}', [CatController::class, 'origin'])->name('cats-origins');
Route::get('/cats/type/{type}', [CatController::class, 'type'])->name('cats-types');

// vue individual records
Route::get('/cats/{cat}', [CatController::class, 'show']);
Route::get('/breeds/{breed}', [BreedController::class, 'show']);
Route::get('/bodies/{body}', [BodyController::class, 'show']);
Route::get('/coats/{coat}', [CoatController::class, 'show']);
Route::get('/origins/{origin}', [OriginController::class, 'show']);
Route::get('/types/{type}', [TypeController::class, 'show']);
Route::get('/patterns/{pattern}', [PatternController::class, 'show']);

// Createing records
Route::post('/create/cat', [CatController::class, 'create'])->name('cat-create');
Route::post('/create/body', [BodyController::class, 'create'])->name('body-create');
Route::post('/create/breed', [BreedController::class, 'create'])->name('breed-create');
Route::post('/create/coat', [CoatController::class, 'create'])->name('coat-create');
Route::post('/create/origin', [OriginController::class, 'create'])->name('origin-create');
Route::post('/create/pattern', [PatternController::class, 'create'])->name('pattern-create');
Route::post('/create/type', [TypeController::class, 'create'])->name('type-create');
