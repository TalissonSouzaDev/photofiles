<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotofilesController;

Route::any('photofile/search',[PhotofilesController::class,'search'])->name('search');
Route::get('photofile',[PhotofilesController::class,'index'])->name('index');
Route::post('photofile/store',[PhotofilesController::class,'store'])->name('store');
Route::put('photofile/put/{id}',[PhotofilesController::class,'update'])->name('put');
Route::delete('photofile/destroy/{id}',[PhotofilesController::class,'destroy'])->name('destroy');

Route::fallback(function(){
    return redirect()->route('index');
});
