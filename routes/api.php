<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Ruta para eliminar un actor
Route::delete('destroyActor/{id}', [ActorController::class, "destroyActor"])->name('destroyActor');
//Ruta para listar las peliculas con sus actores
Route::get('films', [FilmController::class, "listFilmsWithActors"])->name('listFilmsWithActors');
//Ruta para listar los actores con sus peliculas
Route::get('actors', [ActorController::class, "listActorsWithMovies"])->name('listActorsWithMovies');

