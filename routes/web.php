<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AnnouncementController;
use \App\Http\Controllers\Admin;
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
Auth::routes();

Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
        Route::put('/settings/money', [UserController::class, 'addMoney'])->name('user.add.money');
        Route::get('/reservations', [UserController::class, 'reservations'])->name('user.show.reservations');

        Route::get('/annonces', [UserController::class, 'annonces'])->name('user.annonce');
        Route::delete('annonces/delete/{id}', [UserController::class, 'deleteAnnonce'])->name('user.delete.annonce');
        Route::get('/annonces/{id}', [UserController::class, 'annonce'])->name('user.show.annonce');
        Route::put('/annonce/edit/{id}', [UserController::class, 'editAnnonce'])->name('user.edit.annonce');
        Route::get('/annonce/create', [UserController::class, 'create'])->name('user.create.annonce');
        Route::post('/annonce/store', [UserController::class, 'store'])->name('user.store.annonce');

    });
    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/{id}/reserved', [VehicleController::class, 'reserved'])->name('vehicles.reserved');
        Route::post('/{vehicle}/reserved', [VehicleController::class, 'storeReserved'])->name('vehicules.reserved.store');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => [IsAdmin::class]], function () {
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles',[Admin\VehicleController::class, 'index'])->name('admin.vehicle.index');
    Route::get('/vehicles/{id}',[Admin\VehicleController::class, 'show'])->name('admin.vehicle.show');
    Route::put('/vehicles/{id}',[Admin\VehicleController::class, 'update'])->name('admin.vehicle.update');

    Route::get('/annonces',[Admin\AnnouncementController::class, 'index'])->name('admin.annonce.index');
    Route::get('/annonces/edit/{id}',[Admin\AnnouncementController::class, 'update'])->name('admin.annonce.update');
});

Route::group(['prefix' => 'annonces'], function(){
    Route::get('/', [AnnouncementController::class, 'index'])->name('annonce.index');
    Route::post('/search', [AnnouncementController::class, 'search'])->name('annonce.search');
});