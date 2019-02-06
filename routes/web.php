<?php
Route::group(['middleware' => 'admin'], function () {
    //Admin Page
    Route::get('/admin', function () {
        return view('admin.admin');
    });

    //CRUDS
    Route::resource('users', 'UserController');
    Route::resource('buildings', 'BuildingController');
    Route::resource('schedule', 'ScheduleController');
    Route::resource('orders', 'OrderController');
    Route::resource('locations', 'LocationController');

    //Confirm or deny orders
    Route::get('/reject/{id}', 'OrderController@rejectOrder');
    Route::get('/deny/{id}', 'OrderController@cancelOrder');
    Route::get('/confirm/{id}', 'OrderController@approveOrder');
    Route::get('/complete/{id}', 'OrderController@completeOrder');

    Route::get('/home', function () {
        return view('home');
    });

    // Appointment list (requests, pending, complete)
    //Route::get('/home', 'OrderController@homeList');
    Route::post('/calendar', 'OrderController@updateDate');
});


//Ensuring user is logged in
Route::group(['middleware' => 'auth' ], function () {
    //Orders List page
    Route::get('/ordersummary', 'OrderController@listOrders');
    Route::post('/ordersummary', 'OrderController@reviseOrder');

    //Order Placing
    //Route::get('/schedule', 'OrderController@freqUsed');
    //Route::post('/schedule', 'OrderController@scheduleAppt');

    // Landing Page
    Route::get('', function () {
        return view('home');
    });

    //Account details update
    Route::get('/update/user/{id}', 'UserController@singleEdit')->middleware('check');
    Route::post('/update/user/{id}', 'UserController@singleUpdate')->middleware('check');

    //View Order
    Route::get('/view/{id}', 'OrderController@appointment')->middleware('check');

    //View Last Submitted Orders
    Route::get('/submitted', 'OrderController@lastOrder');

    // Order revision
    Route::get('/revise/{id}', 'OrderController@reviseReview');
    Route::post('/revise/{id}', 'OrderController@reviseSubmit');

});


Route::get('/lists', 'ScheduleController@index2');
Route::post('/lists', 'ScheduleController@index2');


// Gallery
Route::get('/gallery', function () {
    return view('gallery');
});

// Contact Form
Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@mailToAdmin');


// Tentative Schedule

Auth::routes();

// Calendar View
Route::get('/calendar', 'OrderController@calendar');

// Login Functions
Route::get('login', array(
    'uses' => 'MainController@showLogin'
));

Route::post('login', array(
    'uses' => 'MainController@doLogin'
));

Route::get('logout', array(
    'uses' => 'MainController@doLogout'
));

Auth::routes();
