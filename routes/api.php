<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register.user');
    Route::post('/login', [AuthController::class, 'login'])->name('login.user');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.user')->middleware("auth:api");
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('houses', HouseController::class,['except' =>  ['index', 'show']]);
    Route::get('user/houses', [HouseController::class,'showForUser']);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('comments', CommentController::class,['except' => ['index', 'show']]);
    Route::apiResource('features', FeatureController::class);
    Route::apiResource('users', UserController::class,["except" => ["store"]]);
});

Route::get('houses', [HouseController::class,"index"]);
Route::get('houses/{house}', [HouseController::class,"show"]);

Route::get('comments', [CommentController::class,"index"]);
Route::get('comments/{comment}', [CommentController::class,"show"]);

Route::get('houses/similar/{id}', [HouseController::class,'showSimilar']);


//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
