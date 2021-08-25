<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\LandmarkController;
use App\Http\Controllers\SocialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// 1|p5WetDsIm7O9wB76cARGUPcsvZeFbyRU3VbMBBBX

/* Public Routes */

// Auth
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

// Local Govt Areas
Route::get('/lga', [LgaController::class, 'index']);
Route::get('lga/{id}', [LgaController::class, 'show']);
Route::get('/lga/search/{name}',[LgaController::class, 'search']);

// Estates
Route::get('/estate', [EstateController::class, 'index']);
Route::get('estate/{id}', [EstateController::class, 'show']);
Route::get('/estate/search/{name}',[EstateController::class, 'search']);
Route::get('/estate/search_lga/{local_govts_id}',[EstateController::class, 'search_lga']);

// Company
Route::get('/company', [CompanyController::class, 'index']);
Route::get('company/{id}', [CompanyController::class, 'show']);
Route::get('/company/search/{name}',[CompanyController::class, 'search']);
Route::get('/company/search_lga/{local_govts_id}',[CompanyController::class, 'search_lga']);
Route::get('/company/search_social/{social_id}',[CompanyController::class, 'search_social']);

// Social
Route::get('/social', [SocialController::class, 'index']);
Route::get('social/{id}', [SocialController::class, 'show']);
Route::get('/social/search/{name}',[SocialController::class, 'search']);

// LandMarks
Route::get('/landmark', [LandmarkController::class, 'index']);
Route::get('landmark/{id}', [LandmarkController::class, 'show']);
Route::get('/landmark/search_lga/{local_govts_id}',[LandmarkController::class, 'search_lga']);
Route::get('/landmark/search/{name}',[LandmarkController::class, 'search']);





/* Protected Routes*/

Route::group(['middleware'=> ['auth:sanctum']], function(){

// Auth
Route::post('/logout',[AuthController::class, 'logout']);

// Local Govts
Route::put('/lga/{id}', [LgaController::class, 'update']);
Route::post('/lga', [LgaController::class, 'store']);
Route::delete('/lga/{id}',[LgaController::class, 'destroy']);

// Estates
Route::put('/estate/{id}', [EstateController::class, 'update']);
Route::post('/estate', [EstateController::class, 'store']);
Route::delete('/estate/{id}',[EstateController::class, 'destroy']);

// Company
Route::put('/company/{id}', [CompanyController::class, 'update']);
Route::post('/company', [CompanyController::class, 'store']);
Route::delete('/company/{id}',[CompanyController::class, 'destroy']);

// Social Functions
Route::put('/social/{id}', [SocialController::class, 'update']);
Route::post('/social', [SocialController::class, 'store']);
Route::delete('/social/{id}',[SocialController::class, 'destroy']);

// Landmarks
Route::put('/landmark/{id}', [LandmarkController::class, 'update']);
Route::post('/landmark', [LandmarkController::class, 'store']);
Route::delete('/landmark/{id}',[LandmarkController::class, 'destroy']);

} );

