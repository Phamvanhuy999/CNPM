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
Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@postLoginAdmin');
Route::get('/home', function () {
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::prefix('loaisanphams')->group(function () {
        Route::get('/', [
            'as' => 'loaisanphams.trangchu',
            'uses' => 'LoaiSanPhamController@trangchu'
        ]);
        Route::get('/themmoi', [
            'as' => 'loaisanphams.themmoi',
            'uses' => 'LoaiSanPhamController@themmoi'
        ]);
        Route::post('/themmoi_gui', [
            'as' => 'loaisanphams.themmoi_gui',
            'uses' => 'LoaiSanPhamController@themmoi_gui'
        ]);

        Route::get('/sua/{id}', [
            'as' => 'loaisanphams.sua',
            'uses' => 'LoaiSanPhamController@sua'
        ]);
        Route::post('/sua_gui/{id}', [
            'as' => 'loaisanphams.sua_gui',
            'uses' => 'LoaiSanPhamController@sua_gui'
        ]);
        Route::get('/xoa/{id}', [
            'as' => 'loaisanphams.xoa',
            'uses' => 'LoaiSanPhamController@xoa'
        ]);
    });
    Route::prefix('hangsanxuats')->group(function () {
        Route::get('/', [
            'as' => 'hangsanxuats.trangchu',
            'uses' => 'HangSanXuatController@trangchu'
        ]);
        Route::get('/themmoi', [
            'as' => 'hangsanxuats.themmoi',
            'uses' => 'HangSanXuatController@themmoi'
        ]);
        Route::post('/themmoi_gui', [
            'as' => 'hangsanxuats.themmoi_gui',
            'uses' => 'HangSanXuatController@themmoi_gui'
        ]);

        Route::get('/sua/{id}', [
            'as' => 'hangsanxuats.sua',
            'uses' => 'HangSanXuatController@sua'
        ]);
        Route::post('/sua_gui/{id}', [
            'as' => 'hangsanxuats.sua_gui',
            'uses' => 'HangSanXuatController@sua_gui'
        ]);
        Route::get('/xoa/{id}', [
            'as' => 'hangsanxuats.xoa',
            'uses' => 'HangSanXuatController@xoa'
        ]);
    });
    //sanpham
    Route::prefix('sanphams')->group(function () {
        Route::get('/', [
            'as' => 'sanphams.trangchu',
            'uses' => 'AdminSanPhamController@trangchu'
        ]);
        Route::get('/themmoi', [
            'as' => 'sanphams.themmoi',
            'uses' => 'AdminSanPhamController@themmoi'
        ]);
        Route::post('/themmoi_gui', [
            'as' => 'sanphams.themmoi_gui',
            'uses' => 'AdminSanPhamController@themmoi_gui'
        ]);
        Route::get('/sua/{id}', [
            'as' => 'sanphams.sua',
            'uses' => 'AdminSanPhamController@sua'
        ]);
        Route::post('/sua_gui/{id}', [
            'as' => 'sanphams.sua_gui',
            'uses' => 'AdminSanPhamController@sua_gui'
        ]);
        Route::get('/xoa/{id}', [
            'as' => 'sanphams.xoa',
            'uses' => 'AdminSanPhamController@xoa'
        ]);

    });
    //Anh Quang Cao
    Route::prefix('sliders')->group(function () {
        Route::get('/', [
            'as' => 'sliders.trangchu',
            'uses' => 'AdminSliderController@trangchu'
        ]);
        Route::get('/themmoi', [
            'as' => 'sliders.themmoi',
            'uses' => 'AdminSliderController@themmoi'
        ]);
        Route::post('/themmoi_gui', [
            'as' => 'sliders.themmoi_gui',
            'uses' => 'AdminSliderController@themmoi_gui'
        ]);
        Route::get('/sua/{id}', [
            'as' => 'sliders.sua',
            'uses' => 'AdminSliderController@sua'
        ]);
        Route::post('/sua_gui/{id}', [
            'as' => 'sliders.sua_gui',
            'uses' => 'AdminSliderController@sua_gui'
        ]);
        Route::get('/xoa/{id}', [
            'as' => 'sliders.xoa',
            'uses' => 'AdminSliderController@xoa'
        ]);

    });

});

