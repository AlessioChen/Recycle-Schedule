<?php

use App\Http\Controllers\RecycleController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('recycles/today/', [RecycleController::class, 'today']);

//  This command makes all the CRUD routes as explained on https://laravel.com/docs/5.2/controllers
 Route::resource('recycles',RecycleController::class);



