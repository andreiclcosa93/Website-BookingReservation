<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;

Route::middleware('supervisor')->prefix('administration')->name('admin.')->group(function(){
    Route::get('panel',[PanelController::class,'showPanel'])->name('panel');
});


