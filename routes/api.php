<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
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

//Route::post('register',[
//    RegisterController::class, 'register'
//]);
//Route::post('login',
//    [LoginController::class, 'login'
//    ]);
//Route::post('refresh',
//    [LoginController::class, 'refresh'
//]);
//Route::middleware('auth.api')->group(function (){
//   Route::post('logout', [
//       LoginController::class, 'logout'
//   ]);
//   Route::get('users',function (Request $request){
//       return $request->user();
//   });
//});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {

    Route::resource('products', ProductController::class);

});
