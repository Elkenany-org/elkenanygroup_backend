<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiJobController;
use App\Models\News;
use App\Models\Job;

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
// Route::get('/jobs', function () {
//     return Job::all();
// });
// Route::get('/jobs' , [ApiJobController::class,'index']);

//news
Route::prefix('news')->group(function () {
    Route::get('/' , [ApiNewsController::class,'index']);
    Route::get('/show/{id}' , [ApiNewsController::class,'show']);
    Route::get('/search/{id}', [ApiNewsController::class, 'show']);
});


//jobs
Route::prefix('jobs')->group(function () {
    Route::get('/' , [ApiJobController::class,'index']);
    Route::get('/show/{id}' , [ApiJobController::class,'show']);
    Route::get('/search/{id}', [ApiJobController::class, 'show']);
});