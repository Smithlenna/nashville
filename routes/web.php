<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\V1\AdminController;
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

Route::get('/', function () {
    return view('frontend.pages.index');
});

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('blogs', BlogController::class);
});