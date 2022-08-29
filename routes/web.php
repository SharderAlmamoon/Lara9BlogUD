<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Demo\SliderController;

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
// FOR FRONTEND

Route::get('/','App\Http\Controllers\frontend\FrontendController@index')->name('hompage');
Route::get('aboutpage','App\Http\Controllers\frontend\FrontendController@about')->name('front.about');

// for Backend

Route::controller(DemoController::class)->group(function(){
    Route::get('/about','index')->name('abouttttt.about')->middleware('check');
    Route::get('/contact','indexconTact')->middleware(['auth','verified'])->name('about.contact');
    Route::get('/signout','signoutrouter')->middleware(['auth','verified'])->name('signoutrouter');
    Route::get('/admin/editeprofile','editeprofile')->middleware(['auth','verified'])->name('editeprofile');
    Route::get('/admin/editprofileFrom','editprofileFrom')->middleware(['auth','verified'])->name('editprofileFrom');
    Route::post('/admin/updateprofile','updateprofilestore')->middleware(['auth','verified'])->name('updateprofile');
    Route::get('/admin/changePAsswordviewPage','changePAsswordviewPage')->middleware(['auth','verified'])->name('changePAsswordviewPage');
    Route::post('/admin/updateuserPasswordchange','updateuserPasswordchange')->middleware(['auth','verified'])->name('updateuserPasswordchange');
});

    Route::group(['prefix'=>'/slider'],function(){
        Route::get('/add',[SliderController::class,'index'])->middleware(['auth','verified'])->name('slider.add');
        Route::get('/manage',[SliderController::class,'manage'])->middleware(['auth','verified'])->name('slider.manage');
        Route::post('/insert',[SliderController::class,'store'])->middleware(['auth','verified'])->name('insert.slider');
        Route::get('/edit/{id}',[SliderController::class,'edit'])->middleware(['auth','verified'])->name('slider.editfrom');
        Route::get('/delete/{id}',[SliderController::class,'destroy'])->middleware(['auth','verified'])->name('slider.delete');
        Route::post('/update/{id}',[SliderController::class,'update'])->middleware(['auth','verified'])->name('update.slider');
    });

    Route::group(['prefix'=>'about'],function(){
        Route::get('add','App\Http\Controllers\Backend\About@create')->middleware(['auth','verified'])->name('about.add');
        Route::get('manage','App\Http\Controllers\Backend\About@index')->middleware(['auth','verified'])->name('about.manage');
        Route::post('store','App\Http\Controllers\Backend\About@store')->middleware(['auth','verified'])->name('insert.about');
        Route::get('edit\{id}','App\Http\Controllers\Backend\About@edit')->middleware(['auth','verified'])->name('edit.about');
        Route::post('update\{id}','App\Http\Controllers\Backend\About@update')->middleware(['auth','verified'])->name('update.about');
        Route::get('delete\{id}','App\Http\Controllers\Backend\About@destroy')->middleware(['auth','verified'])->name('about.delete');
        Route::get('multiimage\{id}','App\Http\Controllers\Backend\About@multiimagepage')->middleware(['auth','verified'])->name('about.multiimage');
        Route::post('multiimageinsert\{id}','App\Http\Controllers\Backend\About@insertMultiImage')->middleware(['auth','verified'])->name('insert.gallerybout');
        Route::get('deleteGalleryImage\{id}','App\Http\Controllers\Backend\About@deletegalleryImage')->middleware(['auth','verified'])->name('deletegalleryImage');
    });

// Frontend

Route::get('/dashboard', function () {
return view('backend.adminDashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/slide', function () {
return view('backend.pages.slider.insertManager');
})->middleware(['auth','verified'])->name('slider');

require __DIR__.'/auth.php';
