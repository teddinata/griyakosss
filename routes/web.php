<?php

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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/kamar', 'RoomController@index')->name('kamar');

Route::get('/detail/{slug}', 'DetailController@index')
    ->name('detail');
Route::get('/travel/{slug}', 'TravelController@index')
    ->name('detailtravel');

Route::post('/checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth', 'verified']);

Route::post('/checkoutwisata/{id}', 'CheckoutWisataController@process')
    ->name('checkoutwisata_process')
    ->middleware(['auth', 'verified']);

Route::get('/checkoutwisata/{id}', 'CheckoutWisataController@index')
    ->name('checkoutwisata')
    ->middleware(['auth', 'verified']);

Route::post('/checkoutwisata/create/{detail_id}', 'CheckoutWisataController@create')
    ->name('checkoutwisata-create')
    ->middleware(['auth', 'verified']);

Route::get('/checkoutwisata/remove/{detail_id}', 'CheckoutWisataController@remove')
    ->name('checkoutwisata-remove')
    ->middleware(['auth', 'verified']);

Route::get('/checkoutwisata/confirm/{id}', 'CheckoutWisataController@success')
    ->name('checkoutwisata-success')
    ->middleware(['auth', 'verified']);

Route::get('/profil', 'ProfilController@index')
    ->middleware(['auth', 'verified']);


Route::get('/editprofil', 'EditProfilController@index')
    ->name('editprofil')
    ->middleware(['auth', 'verified']);

Route::put('/editprofil/update/{id}', 'EditProfilController@update')
    ->name('editprofil.update')
    ->middleware(['auth', 'verified']);


Route::get('/riwayat-transaksi', 'Admin\TransactionController@lihat')
    ->name('history-order')
    ->middleware(['auth', 'verified']);
Route::get('/riwayat-transaksi/invoice/{id}', 'Admin\TransactionController@detail')
    ->name('history-order.detail');
    



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('room-package', 'RoomPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('facilities', 'FacilitiesController');
        Route::resource('room-type', 'RoomTypeController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('travel-gallery', 'TravelGalleryController');
        Route::resource('travel-transaction', 'TravelTransactionController');
        Route::resource('userdata', 'UserDataController');
    });


    
Auth::routes(['verify' => true]);

