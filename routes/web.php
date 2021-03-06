<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopsController;

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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/tas', function () {
//     $tipe ='sekolah';
//     return view('tas',['tipe' => $tipe]);
// });


Route::get('/',[PagesController::class, 'home'])->name('home');
Route::get('/about',[PagesController::class,'about'])->name('about');
Route::get('/catalog',[CatalogController::class,'index'])->name('catalog');

Route::post('/postLogin',[AuthController::class,'postLogin']);
Route::post('/postRegister', [AuthController::class, 'postRegister']);
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::get('/register',[AuthController::class, 'register']);

// Route::get('/items',[ItemsController::class,'index']);
// Route::get('/items/create',[ItemsController::class,'create']);
// Route::get('/items/{item}',[ItemsController::class,'show']);
// Route::post('/items',[ItemsController::class,'store']);
// Route::delete('/items/{item}',[ItemsController::class,'destroy']);
// Route::get('/items/{item}/edit',[ItemsController::class,'edit']);
// Route::patch('/items/{item}',[ItemsController::class,'update']);

Route::get('/catalog/category/', [CatalogController::class, 'indexCategory']);
Route::get('/catalog/category/{id}', [CatalogController::class, 'filterCategory']);

//mengganti route item semuanya
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile',[PagesController::class,'profile'])->name('profile');
    Route::resource('items',ItemsController::class);
    Route::get('/shop', [ShopsController::class, 'show']);
    Route::post('/shopCreate', [ShopsController::class, 'create']);
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::get('GetCitybyState/{id}', [ShopsController::class, 'GetCitybyState']);
});
