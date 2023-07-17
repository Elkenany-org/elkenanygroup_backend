<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiContactUsController;
use App\Http\Controllers\Api\ApiContentController;
use App\Http\Controllers\Api\ApiInfoController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Models\News;
use App\Models\Content;
use App\Models\Job;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Info;

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


//news
Route::prefix('news')->group(function () {
    Route::get('/' , [ApiNewsController::class,'index']);
    Route::get('/show/{id}' , [ApiNewsController::class,'show']);
    Route::get('/search', [ApiNewsController::class, 'search']);
});


//jobs
Route::prefix('jobs')->group(function () {
    Route::get('/' , [ApiJobController::class,'index']);
    Route::get('/show/{id}' , [ApiJobController::class,'show']);
    Route::get('/search', [ApiJobController::class, 'search']);
});


//catgories
Route::prefix('categories')->group(function () {
    Route::get('/' , [ApiCategoryController::class,'index']);
    Route::get('/show/{id}' , [ApiCategoryController::class,'show']);
    Route::get('/search/{id}', [ApiCategoryController::class, 'show']);
});


//infos
Route::prefix('infos')->group(function () {
    Route::get('/' , [ApiInfoController::class,'index']);
    Route::get('/show/{id}' , [ApiInfoController::class,'show']);
    Route::get('/search/{id}', [ApiInfoController::class, 'show']);
});

//contactus
Route::post('contactus/store' , [ApiContactUsController::class,'store']);

//order
Route::post('order/store' , [ApiOrderController::class,'store']);

// //header of pages
// Route::prefix('content')->group(function(){
//     Route::get('/{home}',[ApiHeaderPageController::class,'show']);
//     Route::get('/{aboutus}',[ApiHeaderPageController::class,'show']);
//     Route::get('/{careers}',[ApiHeaderPageController::class,'show']);
// });
Route::prefix('content')->group(function () {
    //header of pages 
    Route::get('/{home}/header' , [ApiContentController::class,'header'])->name('homeheader.show');
    Route::get('/{aboutus}/header' , [ApiContentController::class,'header'])->name('aboutusheader.show');
    Route::get('/{careers}/header' , [ApiContentController::class,'header'])->name('careersheader.show');
    Route::post('/{page_name}/header/update' , [ApiContentController::class,'headerupdate'])->name('pageheader.update');
    //reasons of careers page
    Route::get('/careers/{reason1}' , [ApiContentController::class,'reason'])->name('careersreason1.show');
    Route::get('/careers/{reason2}' , [ApiContentController::class,'reason'])->name('careersreason2.show');
    Route::get('/careers/{reason3}' , [ApiContentController::class,'reason'])->name('careersreason3.show');
    Route::post('/careers/{type}/update' , [ApiContentController::class,'reasonupdate'])->name('careersreason.update');
});