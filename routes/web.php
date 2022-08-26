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

Route::get('/', function () {
    return view('frontend.frontendDashboard');
});

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
        Route::get('/edit',[SliderController::class,'edit'])->middleware(['auth','verified'])->name('slider.editfrom');
        Route::get('/delete',[SliderController::class,'destroy'])->middleware(['auth','verified'])->name('slider.delete');
    });

// Frontend

Route::get('/dashboard', function () {
return view('backend.adminDashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/slide', function () {
return view('backend.pages.slider.insertManager');
})->middleware(['auth','verified'])->name('slider');

require __DIR__.'/auth.php';
