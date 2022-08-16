
    Route::controller(DemoController::class)->group(function(){
        Route::get('/about','index')->name('abouttttt.about')->middleware('check');
        Route::get('/contact','indexconTact')->name('about.contact');
    });
    