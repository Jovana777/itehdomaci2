<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\JezikController;
use App\Http\Controllers\NastavnikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOcenaController;
use App\Http\Controllers\NastavnikOcenaController;
use App\Http\Controllers\JezikOcenaController;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//moj profil
Route::middleware('auth:sanctum')->get('/myprofile', function (Request $request) {
    return new UserResource($request->user());
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    //admin
    Route::resource('jezici', JezikController::class)->only(['store', 'update', 'destroy']); 
    Route::resource('nastavnici', NastavnikController::class)->only(['store', 'update', 'destroy']); 
    Route::resource('users', UserController::class)->only(['destroy']); 
    Route::post('/register', [AuthController::class, 'register']); 
    Route::resource('users', UserController::class)->only(['index', 'show']); 
    //user
    Route::resource('ocena', OcenaController::class)->only(['store', 'update', 'destroy']); 

    //svi koji su ulogovani
   Route::post('/logout', [AuthController::class, 'logout']); 
   Route::get('/myocena', [UserOcenaController::class, 'myocena']); 
   Route::resource('users', UserController::class)->only(['update']);
});
//javne
Route::resource('jezici', JezikController::class)->only(['index', 'show']);

Route::resource('nastavnici', NastavnikController::class)->only(['index', 'show']);

Route::resource('ocena', OcenaController::class)->only(['index', 'show']);

Route::get('/users/{id}/ocena', [UserOcenaController::class, 'index']);

Route::get('/nastavnici/{id}/ocena', [NastavnikOcenaController::class, 'index']);

Route::get('/jezici/{id}/ocena', [JezikOcenaController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
