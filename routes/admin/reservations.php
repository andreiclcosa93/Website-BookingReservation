<?php

use App\Http\Controllers\Admin\ReservationsController;
use Illuminate\Support\Facades\Route;

//grupul de rute pentru utilizator
Route::middleware('auth')->prefix('user')->name('reservations.')->group(function(){

    //crearea de catre utilizator a unei rezervari
    Route::post('reservation/room/{id}',[ReservationsController::class, 'createReservation'])->name('create');
    //isi vede rezervarile in cont
    Route::get('account',[ReservationsController::class, 'viewAccount'])->name('account');

    //utilizatorul isi sterge rezervarea
    Route::delete('reservation/delete/{id}', [ReservationsController::class, 'deleteReservation'])->name('delete');

});

//grupul de rute pentru administrarea rezervarilor
Route::middleware('supervisor')->prefix('administration')->name('admin.')->group(function(){

    //ruta pentru afisarea rezervarilor in control panel
    Route::get('reservations',[ReservationsController::class,'reservationsList'])->name('reservations.list');

    //filtrarea lunara a rezervarilor
    Route::get('reservation/month',[ReservationsController::class,'filterMonth'])->name('reservations.filterMonth');

    //confirmarea unei rezervari
    Route::post('reservation/confirm/{id}', [ReservationsController::class,'confirmReservation'])->name('reservation.confirm');

    //anularea unei rezervari
    Route::post('reservation/cancel/{id}', [ReservationsController::class,'cancelReservation'])->name('reservation.cancel');

});
