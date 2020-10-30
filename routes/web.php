<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ItemsController;

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


Route::get('/',[PagesController::class, 'home']);
Route::get('/about',[PagesController::class,'about']);
Route::get('/barang',[BarangController::class,'index']);
Route::get('/login',[PagesController::class, 'login']);
Route::get('/register',[PagesController::class, 'register']);

//item sama dengan barang
// Route::get('/items',[ItemsController::class,'index']);
// Route::get('/items/create',[ItemsController::class,'create']);
// Route::get('/items/{item}',[ItemsController::class,'show']);
// Route::post('/items',[ItemsController::class,'store']);
// Route::delete('/items/{item}',[ItemsController::class,'destroy']);
// Route::get('/items/{item}/edit',[ItemsController::class,'edit']);
// Route::patch('/items/{item}',[ItemsController::class,'update']);

//mengganti route item semuanya
Route::resource('items',ItemsController::class);