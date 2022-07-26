<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;

Route::get('/',[PagesController::class,'homePage'])->name('home');

//ruta care afiseaza pagina cu toate camerele
Route::get('/rooms' ,[PagesController::class,'roomsPage'])->name('rooms');

//ruta care afiseaza o camera
Route::get('/room/{id}', [PagesController::class,'roomDetail'])->name('rooms.detail');


//ruta contact
Route::get('/contact',[PagesController::class,'showContact'])->name('contact');

//ruta despre noi
Route::get('/about',[PagesController::class,'showAbout'])->name('about');
Route::get('/blog',[PagesController::class,'showBlog'])->name('blog');

//ruta pentur trimiterea unui mesaj
Route::post('/new-message',[PagesController::class,'newMessage'])->name('new-message');
