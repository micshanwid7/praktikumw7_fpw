<?php

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

Route::get('/218116765', 'PageController@viewHome');

Route::get('/register', 'PageController@loadCaptcha');

Route::get('/login', 'PageController@loadCaptcha2');

Route::get('/logout', 'PageController@logout');

Route::post('/insertData', 'PageController@cekDataRegis');

Route::post('/inLogin', 'PageController@cekLogin');

Route::get('/payment', function () {
    return view('form.payment');
});

Route::get('/hotel', 'PageController@viewHotel');

Route::get('/room', 'PageController@viewRoom');

Route::get('/profile', 'PageController@viewProfile');

Route::post('/topup', 'PageController@topUp');

Route::post('/booking', 'PageController@bookingRoom');

Route::post('/addWishlist', 'PageController@addSession');

Route::post('/delWishlist', 'PageController@deleteSession');

Route::group(['middleware' => 'authentication'], function () {

    Route::get('/admin', function () {
        return view('form.admin');
    });

    Route::get('/voucher', 'PageController@viewVoucher');

    Route::post('/insertDataV', 'PageController@addVoucher');

    Route::post('/insertDataH', 'PageController@tmbhHotel');

    Route::get('/voucher/hapus/{id_voucher}', 'PageController@deleteVoucher');

    Route::get('/management', 'PageController@viewManagement');

    Route::get('/management/ban/{id_user}', 'PageController@banUser');

    Route::get('/management/unban/{id_user}', 'PageController@unbanUser');

    Route::get('/management/nonaktif/{id_hotel}', 'PageController@nonaktifHotel');

    Route::get('/management/aktif/{id_hotel}', 'PageController@aktifHotel');
});



