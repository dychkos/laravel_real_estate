<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

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

Route::get('/', [HouseController::class,'index']);
Route::get('houses/{id}',[HouseController::class,'showOne'])->where('id',"[0-9]+");
Route::get('houses/add_form',[HouseController::class,'addShow']);
Route::post('houses/add_form',[HouseController::class,'store']);

