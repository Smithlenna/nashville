<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Front\HomeController;
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

// Route::get('/', function () {
//     return view('frontend.pages.index');
// });

Route::get('/', HomeController::class)->name('home');


Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/settings', function () {
        return view('admin.pages.setting');
    });
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('blogs', BlogController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('company', CompanyDetailController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('social', SocialController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('testimonials', TestimonialController::class);
});