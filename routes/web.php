<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Demo\SliderController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\PostCategoryController;
use App\Http\Controllers\Backend\PostAuthorControllerr;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\ContactFromController;

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
Route::get('potfolio/details/{id}','App\Http\Controllers\frontend\FrontendController@details')->name('portfolio.details');
Route::get('potfolio/details/','App\Http\Controllers\frontend\FrontendController@portfoliodetails')->name('portfolio.detailss');
Route::get('potfolio','App\Http\Controllers\frontend\FrontendController@homeportfolio')->name('portfolio.home');
Route::get('/ourblog','App\Http\Controllers\frontend\FrontendController@ourblog')->name('ourblog.home');
Route::get('/readmoreBlog/{id}','App\Http\Controllers\frontend\FrontendController@ReadmoreBlog')->name('readmore.blog');
Route::get('/categoryPosts/{id}','App\Http\Controllers\frontend\FrontendController@categoryPosts')->name('category.posts');
Route::get('/recentBlog/{id}','App\Http\Controllers\frontend\FrontendController@recentBlogId')->name('recent.blogtd');

// for Backend

// PROFILEPAGE
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

    // SLIDER
    Route::group(['prefix'=>'/slider'],function(){
        Route::get('/add',[SliderController::class,'index'])->middleware(['auth','verified'])->name('slider.add');
        Route::get('/manage',[SliderController::class,'manage'])->middleware(['auth','verified'])->name('slider.manage');
        Route::post('/insert',[SliderController::class,'store'])->middleware(['auth','verified'])->name('insert.slider');
        Route::get('/edit/{id}',[SliderController::class,'edit'])->middleware(['auth','verified'])->name('slider.editfrom');
        Route::get('/delete/{id}',[SliderController::class,'destroy'])->middleware(['auth','verified'])->name('slider.delete');
        Route::post('/update/{id}',[SliderController::class,'update'])->middleware(['auth','verified'])->name('update.slider');
    });
    // ABOUT
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
    // PORTFOLIO 

  Route::controller(PortfolioController::class)->group(function(){
    Route::get('potfolio/add','create')->middleware(['auth','verified'])->name('add.portfolio');
    Route::get('potfolio/manage','index')->middleware(['auth','verified'])->name('manage.portfolio');
    Route::post('potfolio/insert','store')->middleware(['auth','verified'])->name('portfolio.insert');
    Route::get('potfolio/edit/{id}','edit')->middleware(['auth','verified'])->name('edit.portfolio');
    Route::post('potfolio/update/{id}','update')->middleware(['auth','verified'])->name('portfolio.update');
    Route::get('potfolio/delete/{id}','destroy')->middleware(['auth','verified'])->name('delete.portfolio');
  });
  // Author Category
  Route::group(['prefix'=>'category'],function(){
    Route::get('/create',[PostCategoryController::class,'create'])->middleware(['auth','verified'])->name('create.category');
    Route::post('/store',[PostCategoryController::class,'store'])->middleware(['auth','verified'])->name('store.category');
    Route::get('/manage',[PostCategoryController::class,'index'])->middleware(['auth','verified'])->name('manage.category');
    Route::get('/edit/{id}',[PostCategoryController::class,'edit'])->middleware(['auth','verified'])->name('edit.category');
    Route::get('/delete/{id}',[PostCategoryController::class,'destroy'])->middleware(['auth','verified'])->name('delete.category');
    Route::post('/update/{id}',[PostCategoryController::class,'update'])->middleware(['auth','verified'])->name('update.category');
  });

  //Author Name InserTed With Ajax

  Route::group(['prefix' => 'author'],function(){
    Route::get('/manageauthor',[PostAuthorControllerr::class,'index'])->middleware(['auth','verified'])->name('manage.author');
    Route::post('/storeauthor',[PostAuthorControllerr::class,'store'])->middleware(['auth','verified']);
    Route::get('/forshow',[PostAuthorControllerr::class,'show'])->middleware(['auth','verified']);
    Route::get('/editShowFrom/{id}',[PostAuthorControllerr::class,'edit'])->middleware(['auth','verified']);
    Route::post('/updateauthor/{id}',[PostAuthorControllerr::class,'update'])->middleware(['auth','verified']);
    Route::get('/deleteauthor/{id}',[PostAuthorControllerr::class,'destroy'])->middleware(['auth','verified']);
  });
  // POST ALL
  Route::controller(PostController::class)->group(function(){
    Route::get('/post/create','create')->middleware(['auth','verified'])->name('post.create');
    Route::get('/post/manage','index')->middleware(['auth','verified'])->name('manage.post');
    Route::post('/post/store','store')->middleware(['auth','verified'])->name('post.store');
    Route::get('/post/edit/{id}','edit')->middleware(['auth','verified'])->name('edit.post');
    Route::post('/post/update/{id}','update')->middleware(['auth','verified'])->name('update.post');
    Route::get('/post/delete/{id}','destroy')->middleware(['auth','verified'])->name('delete.post');
  });
  // FooTer For Frontend
 Route::group(['prefix'=>'/footer'],function(){
    Route::get('/create',[FooterController::class,'create'])->middleware(['auth','verified'])->name('footer.create');
    Route::get('/manage',[FooterController::class,'index'])->middleware(['auth','verified'])->name('footer.manage');
    Route::post('/store',[FooterController::class,'store'])->middleware(['auth','verified'])->name('footer.insert');
    Route::get('/edit/{id}',[FooterController::class,'edit'])->middleware(['auth','verified'])->name('footer.edit');
    Route::post('/update/{id}',[FooterController::class,'update'])->middleware(['auth','verified'])->name('footer.update');
    Route::get('/delete/{id}',[FooterController::class,'destroy'])->middleware(['auth','verified'])->name('footer.delete');
 });
  // Contact ForM 
 Route::group(['prefix'=>'/contactFrom'],function(){
    Route::get('/manage',[ContactFromController::class,'index'])->middleware(['auth','verified'])->name('manage.ContactForm');
    Route::get('/delete/{id}',[ContactFromController::class,'destroy'])->middleware(['auth','verified'])->name('delete.contact');
    Route::POST('/insert',[ContactFromController::class,'store'])->name('contact.insert');
   
 });

Route::get('/dashboard', function () {
return view('backend.adminDashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/slide', function () {
return view('backend.pages.slider.insertManager');
})->middleware(['auth','verified'])->name('slider');

require __DIR__.'/auth.php';
