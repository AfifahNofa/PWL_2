<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

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
   echo "Selamat Datang";
});
Route::get('/about', function(){
   echo "2141720103", "Afifah Nofa";
});
Route::get('/articles/{id}', function($id){
   echo "Halaman Artikel dengan ID ";
});
Route::get('/', [HomeController::class, 'index']);
Route::prefix('products')->group(function(){
   Route::get('/', [ProductController::class, 'index']);
   Route::get('/marbel-edu-games', function (){
       return "Marbel Edu Games";
    });
   Route::get('/marbel-and-friends-kids-games', function (){
       return "Marbel and Friends Kids Games";
   });
  Route::get('/riri-story-books', function (){
       return "Riri Story Books";
   });
   Route::get('/kolak-kids-songs', function (){
       return "Kolak Kids Songs";
   });
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news}', [NewsController::class, 'a']);

Route::prefix('program')->group(function() {
    Route::get('/', [ProgramController::class, 'index']);
    Route::get('/karir', [ProgramController::class, 'kar']);
    Route::get('/magang', [ProgramController::class, 'mag']);
    Route::get('/kunjungan-industri', [ProgramController::class, 'kunjIndustri']);
});

Route::get("/about-us", [AboutUsController::class, 'about']);
Route::get("/contact-us", [ContactUsController::class, 'contact']);



