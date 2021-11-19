<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HouseController::class,'index'])->name("home");
Route::redirect('/houses','/');

Route::middleware("guest")->group(function(){
    Route::get('/login',[LoginController::class,'index'])->name("login");
    Route::get('/logout',[LoginController::class,'logout'])->withoutMiddleware("guest")->name("login.logout");
    Route::post('/login',[LoginController::class,'store'])->name("login.store");

    Route::get('/registration',[RegistrationController::class,'index'])->name("registration");
    Route::post('/registration',[RegistrationController::class,'store'])->name("registration.store");
});


Route::get('houses/{id}',[HouseController::class,'show'])->where('id',"[0-9]+")->name("houses.show");
Route::post('houses/{id}',[OrderController::class,'store'])->where('id',"[0-9]+")->name("orders.store");

Route::get('feedback/',[CommentController::class,'create'])->name("comment.create");
Route::post('feedback/',[CommentController::class,'store'])->name("comment.store");



Route::middleware("auth")->group(function(){
    Route::get('user/houses/create',[HouseController::class,'create'])->middleware("auth")->name("user.houses.create");
    Route::post('user/houses/create',[HouseController::class,'store'])->name("user.houses.store");

    Route::get('user/houses',[HouseController::class,'showForUser'])->name("user.houses");
    Route::get('user/houses/{id}/',[HouseController::class,'show'])->name("user.houses.show")->middleware("access");
    Route::get('user/houses/{id}/edit',[HouseController::class,'edit'])->name("user.houses.edit")->middleware("access");
    Route::post('user/houses/{id}/edit',[HouseController::class,'update'])->name("user.houses.update")->middleware("access");

    Route::get('user/edit',[UserController::class,'edit'])->name("user.edit");
    Route::post('user/update',[UserController::class,'update'])->name("user.update");

    Route::get("user/orders",[OrderController::class,'index'])->name("user.orders");


    Route::middleware("admin_role")->group(function (){
        Route::get("user/admin-panel",[AdminController::class,"index"])->name("user.admin.index");
        Route::get("user/admin-panel/users",[AdminController::class,"usersShow"])->name("user.admin.users");
        Route::get("user/admin-panel/houses",[AdminController::class,"housesShow"])->name("user.admin.houses");
        Route::get("user/admin-panel/orders",[AdminController::class,"ordersShow"])->name("user.admin.orders");

        Route::post("user/admin-panel/features",[AdminController::class,"storeFeatures"])->name("user.admin.features.store");
        Route::delete("user/admin-panel/features",[AdminController::class,"deleteFeatures"])->name("user.admin.features.delete");
        Route::delete("user/admin-panel/comments",[AdminController::class,"deleteComments"])->name("user.admin.comments.delete");
        Route::post("user/admin-panel/houses",[AdminController::class,"updateHouses"])->name("user.admin.houses.update");
        Route::post("user/admin-panel/users",[AdminController::class,"updateUsers"])->name("user.admin.users.update");
    });

});


