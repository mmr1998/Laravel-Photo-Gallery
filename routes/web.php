<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

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

Route::get('/', [GalleryController::class, 'showAll'])->name('showAll');

Route::group(['middleware' => 'auth'], function(){
	Route::prefix('/user/')->group(function(){
		Route::get('galleries/create', [GalleryController::class, 'createGallery'])->name('createGallery');
		Route::post('galleries/store', [GalleryController::class, 'storeGallery'])->name('storeGallery');
		Route::get('galleries/show/{id}', [GalleryController::class, 'showGallery'])->name('showGallery');
		Route::get('galleries/edit/{id}', [GalleryController::class, 'editGallery'])->name('editGallery');
		Route::post('galleries/update/{id}', [GalleryController::class, 'updateGallery'])->name('updateGallery');
		Route::get('galleries/delete/{id}', [GalleryController::class, 'removeGallery'])->name('deleteGallery');

		//photos
		Route::get('galleries/photo/create/{id}', [GalleryController::class, 'uploadPhoto'])->name('photoUpload');
		Route::post('galleries/photo/store', [GalleryController::class, 'storePhoto'])->name('storePhoto');
		Route::get('galleries/photo/show/{id}', [GalleryController::class, 'showPhoto'])->name('showPhoto');
		Route::get('galleries/photo/change/{id}', [GalleryController::class, 'changePhoto'])->name('changePhoto');
		Route::post('galleries/photo/update/{id}', [GalleryController::class, 'updatePhoto'])->name('updatePhoto');
		Route::get('galleries/photo/remove/{id}', [GalleryController::class, 'deletePhoto'])->name('deletePhoto');
	});
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
