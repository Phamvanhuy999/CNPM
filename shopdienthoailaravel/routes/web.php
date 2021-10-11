<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/home', function () {
    return view('home');
});
Route::prefix('loaisanphams')->group(function () {
    Route::get('/', [
        'as'=>'loaisanphams.trangchu',
        'uses'=>'LoaiSanPhamController@trangchu'
    ]);
    Route::get('/themmoi', [
        'as'=>'loaisanphams.themmoi',
        'uses'=>'LoaiSanPhamController@themmoi'
    ]);
    Route::post('/themmoi_gui', [
        'as'=>'loaisanphams.themmoi_gui',
        'uses'=>'LoaiSanPhamController@themmoi_gui'
    ]);

    Route::get('/sua/{id}', [
        'as'=>'loaisanphams.sua',
        'uses'=>'LoaiSanPhamController@sua'
    ]);
    Route::post('/sua_gui/{id}', [
        'as'=>'loaisanphams.sua_gui',
        'uses'=>'LoaiSanPhamController@sua_gui'
    ]);
    Route::get('/xoa/{id}', [
        'as'=>'loaisanphams.xoa',
        'uses'=>'LoaiSanPhamController@xoa'
    ]);
});
