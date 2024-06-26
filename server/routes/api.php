<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
Route::get('/product', function (Request $request) {
    return 'Hello product from get';
});
Route::post('/product', function (Request $request) {
    return 'Hello product from post';
});
Route::put('/product', function (Request $request) {
    return 'Hello product from update';
});
Route::delete('/product', function (Request $request) {
    return 'Hello product from delete';
});

Route::get('/students', [StudentController::class, 'get']);
Route::post('/students', [StudentController::class, 'add']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'delete']);

