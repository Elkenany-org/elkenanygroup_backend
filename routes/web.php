<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\JobController;
// use App\Http\Controllers\ComplaintController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/error', function () {
    return view('errors.404');
})->name('error_page');



//info
Route::prefix('info')->group(function () {
    Route::get('/' , [InfoController::class,'index'])->name('info.index');
    Route::get('create' , [InfoController::class, 'create'])->name('info.create');
    Route::get('/show/{id}' , [InfoController::class,'show'])->name('info.show');
    Route::get('/edit/{id}' , [InfoController::class,'edit'])->name('info.edit');
    Route::put('/info/update/{id}' , [InfoController::class,'update'])->name('info.update');
    Route::put('/info/delete/{id}' , [InfoController::class,'delete'])->name('info.delete');
});

//contactus
Route::get('/contactus' , [ContactUsController::class,'index'])->name('contactus.index');
Route::get('/contactus/create' , [ContactUsController::class,'create'])->name('contactus.create');
Route::get('/contactus/store' , [ContactUsController::class,'store'])->name('contactus.store');



//category
Route::prefix('category')->group(function () {
    Route::get('/' , [CategoryController::class,'index'])->name('category.index');
    Route::get('/archive' , [CategoryController::class,'archive'])->name('category.archive');
    Route::get('/create' , [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store' , [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{id}' , [CategoryController::class,'show'])->name('category.show');
    Route::get('/edit/{id}' , [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/update/{id}' , [CategoryController::class,'update'])->name('category.update');
    Route::get('/destroy/{id}' , [CategoryController::class,'soft_delete'])->name('category.soft_delete');
    Route::get('/restore/{id}' , [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/delete/{id}' , [CategoryController::class,'hard_delete'])->name('category.hard_delete');
});


//News
Route::prefix('news')->group(function () {
    Route::get('/' , [NewsController::class,'index'])->name('News.index');
    Route::get('/archive' , [NewsController::class,'archive'])->name('News.archive');
    Route::get('/create' , [NewsController::class, 'create'])->name('News.create');
    Route::post('/store' , [NewsController::class, 'store'])->name('News.store');
    Route::get('/show/{id}' , [NewsController::class,'show'])->name('News.show');
    Route::get('/edit/{id}' , [NewsController::class,'edit'])->name('News.edit');
    Route::post('/update/{id}' , [NewsController::class,'update'])->name('News.update');
    Route::get('/destroy/{id}' , [NewsController::class,'soft_delete'])->name('News.soft_delete');
    Route::get('/restore/{id}' , [NewsController::class,'restore'])->name('News.restore');
    Route::get('/delete/{id}' , [NewsController::class,'hard_delete'])->name('News.hard_delete');
    Route::get('/search', [NewsController::class, 'search'])->name('News.search');

});


//Jobs
Route::prefix('job')->group(function () {
    Route::get('/' , [JobController::class,'index'])->name('Jobs.index');
    Route::get('/archive' , [JobController::class,'archive'])->name('Jobs.archive');
    Route::get('/create' , [JobController::class, 'create'])->name('Jobs.create');
    Route::post('/store' , [JobController::class, 'store'])->name('Jobs.store');
    Route::get('/show/{id}' , [JobController::class,'show'])->name('Jobs.show');
    Route::get('/edit/{id}' , [JobController::class,'edit'])->name('Jobs.edit');
    Route::get('/update/{id}' , [JobController::class,'update'])->name('Jobs.update');
    Route::get('/destroy/{id}' , [JobController::class,'soft_delete'])->name('Jobs.soft_delete');
    Route::get('/restore/{id}' , [JobController::class,'restore'])->name('Jobs.restore');
    Route::get('/delete/{id}' , [JobController::class,'hard_delete'])->name('Jobs.hard_delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


