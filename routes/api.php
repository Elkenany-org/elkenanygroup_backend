<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiArticleController;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiContactUsController;
use App\Http\Controllers\Api\ApiContentController;
use App\Http\Controllers\Api\ApiInfoController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiPartnerController;
use App\Models\News;
use App\Models\Article;
use App\Models\Content;
use App\Models\Job;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Info;
use App\Models\Partner;

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

//partners
Route::get('/partners' , [ApiPartnerController::class,'index']);

//news
Route::prefix('news')->group(function () {
    Route::get('/' , [ApiNewsController::class,'index']);
    Route::get('/show/{id}' , [ApiNewsController::class,'show']);
    Route::get('/search', [ApiNewsController::class, 'search']);
    Route::get('/latestnews', [ApiNewsController::class, 'latestnews']);
});

//articles
Route::prefix('articles')->group(function () {
    Route::get('/' , [ApiArticleController::class,'index']);
    Route::get('/show/{id}' , [ApiArticleController::class,'show']);
    Route::get('/search' , [ApiArticleController::class,'search']);
});


//jobs
Route::prefix('jobs')->group(function () {
    Route::get('/' , [ApiJobController::class,'index']);
    Route::get('/available_jobs' , [ApiJobController::class,'available_jobs']);
    Route::get('/show/{id}' , [ApiJobController::class,'show']);
    Route::get('/search', [ApiJobController::class, 'search']);
    Route::post('/apply', [ApiJobController::class, 'apply']);
});


//aboutus
Route::get('/content/aboutus' , [ApiContentController::class,'aboutus']);

//careers
Route::get('/content/careers' , [ApiContentController::class,'careers']);

//ourcompanies
Route::get('/content/ourcompanies' , [ApiContentController::class,'ourcompanies']);

//home
Route::get('/content/home' , [ApiContentController::class,'home']);

//contactus
Route::get('/content/contactus' , [ApiContentController::class,'contactus']);

//ordernow
Route::get('/content/ordernow' , [ApiContentController::class,'ordernow']);


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
