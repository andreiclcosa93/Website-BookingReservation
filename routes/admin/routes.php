<?php

use App\Http\Controllers\Admin\FacilitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\RoomFacilitiesController;
use App\Http\Controllers\Admin\RoomsController;

Route::middleware('supervisor')->prefix('administration')->name('admin.')->group(function(){
    Route::get('panel',[PanelController::class,'showPanel'])->name('panel');

    // ==== RUTELE PENTRU UTILIZATORI IN TABEL ===
    Route::get('users-list',[PanelController::class, 'showUsers'])->name('users.list');

    //=== RUTELE PENTRU ADMINISTRAREA CAMERELOR

    // listarea camerelor
    Route::get('rooms',[RoomsController::class,'showRooms'])->name('rooms.list');

    //afisarea formularului pentru adaugarea unei camere
    Route::get('rooms/add',[RoomsController::class,'addRooms'])->name('rooms.add');
    //creem o noua camera
    Route::post('rooms/create',[RoomsController::class,'createRooms'])->name('rooms.create');

    //ruta pentru afisarea formularului de editare a camerei
    Route::get('rooms/edit/{id}',[RoomsController::class,'editRooms'])->name('rooms.edit');
    //ruta pentru updatarea unei camere
    Route::put('rooms/update/{id}',[RoomsController::class,'updateRooms'])->name('rooms.update');

    //stergerea unei camere
    Route::delete('rooms/delete/{id}', [RoomsController::class,'deleteRooms'])->name('rooms.delete');

//=============================================================
    //=== RUTELE PENTRU ADMINISTRAREA Imaginilor pentru camere
//=============================================================

    //editarea imaginilor pentru o camera
    Route::get('rooms/photos/{id}',[PhotosController::class,'editPhotos'])->name('rooms.photos.edit');
    //adugarea unei imagini in galeria foto a unei camere

    Route::post('rooms/photos/upload/{id}',[PhotosController::class,'uploadPhotos'])->name('rooms.photos.upload');
    Route::put('rooms/photos/update/{id}',[PhotosController::class,'updatePhotos'])->name('rooms.photos.update');

    //ruta pentru stergerea unei imagini a unei camere
    Route::delete('room/photo/delete/{id}',[PhotosController::class,'deletePhotos'])->name('rooms.photos.delete');


 //=============================================================
    //=== RUTELE PENTRU ADMINISTRAREA Facilitatilor unei camere
    //=============================================================
    //listarea setului de facilitati pentru camere
    Route::get('facilities', [FacilitiesController::class, 'listFacilities'])->name('facilities.list');

    //adaugarea unei facilitati
    Route::post('/facilitiess/add', [FacilitiesController::class, 'createFacility'])->name('facilities.create');
    Route::put('/facilitiess/update/{id}', [FacilitiesController::class, 'updateFacility'])->name('facilities.update');

    //stergerea unei facilitati
    Route::delete('/facilitiess/delete/{id}', [FacilitiesController::class, 'deleteFacility'])->name('facilities.delete');


    //=============================================================
    //=== RUTELE PENTRU ATASAREA DE FACILITATI UNEI CAMERE
    //=============================================================

    //afisam lista de facilitati
    Route::get('facilities/room/{id}', [RoomFacilitiesController::class,'listFacilities'])->name('room.facilities');
    //atasam un numar de faciitati unei camere
    Route::post('facilities/room/attach/{id}', [RoomFacilitiesController::class,'attachFacilities'])->name('room.facilities.attach');

});


