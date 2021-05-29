<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/projects', [\App\Http\Controllers\ApiController::class, 'projects']);
Route::get('/stages', [\App\Http\Controllers\ApiController::class, 'stages']);
Route::get('/tasks', [\App\Http\Controllers\ApiController::class, 'tasks']);
Route::get('/tasks_all', [\App\Http\Controllers\ApiController::class, 'tasks_all']);
Route::get('/stage/tasks', [\App\Http\Controllers\ApiController::class, 'stage_tasks']);
Route::get('/staff', [\App\Http\Controllers\ApiController::class, 'staff']);
