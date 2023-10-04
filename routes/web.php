<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [ImageController::class, 'index'])->name('images.index');
// Route::post('/images/upload', 'ImageController@upload')->name('uploadImage');
// Route::delete('/images/{id}', [ImageController::class, 'delete'])->name('images.delete');

Route::resource('files', FileuploadController::class);
