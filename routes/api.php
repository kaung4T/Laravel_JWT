<?php

use App\Http\Controllers\ApiControlle;
use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);
    Route::post('me', [AuthApiController::class, 'me']);

});

Route::get('allUser', [ApiControlle::class, 'all_user'])->name('allUser')->middleware('jwt.verify');
Route::post('create_user', [ApiControlle::class, 'create_user'])->name('create_user')->middleware('jwt.verify');

Route::post('user_create', [AuthApiController::class, 'user_create'])->name('user_create');
Route::post('user_login', [AuthApiController::class, 'user_login'])->name('user_login');
Route::get('user_all', [AuthApiController::class, 'user_all'])->name('user_all');
