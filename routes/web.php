<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;

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
    return view('welcome');
});

Route::controller(DemoController::class)->group(function(){
    Route::get('/about','index')->name('abouttttt.about')->middleware('check');
    Route::get('/contact','indexconTact')->name('about.contact');
    Route::get('/signout','signoutrouter')->name('signoutrouter');
});


Route::get('/dashboard', function () {
return view('backend.adminDashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/slide', function () {
return view('backend.pages.slider.insertManager');
})->middleware(['auth','verified'])->name('slider');

require __DIR__.'/auth.php';
