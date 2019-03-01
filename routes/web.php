<?php

Route::group(['middleware' => 'admin'], function () {

    //Admin Page
    Route::get('/admin', function () {
        return view('admin.admin');
    });

    //CRUDS
    Route::resource('users', 'UserController');
    Route::resource('schedule', 'ScheduleController');
    Route::resource('events', 'EventController');
    Route::resource('staff', 'StaffController');
    Route::resource('shiftchanges', 'ShiftChangeController');


    Route::get('/home', function () {
        return view('home');
    });

    // Appointment list (requests, pending, complete)
    //Route::get('/home', 'OrderController@homeList');
    Route::post('/calendar', 'OrderController@updateDate');

    //Recent Changes
    Route::get('/changes', 'ShiftChangeController@recent');

    // Viewing & Updating shifts
    Route::get('/lists', 'ScheduleController@listShifts');
    Route::post('/lists', 'ScheduleController@listShifts');
    Route::get('/lists/{id}/{char}', 'ScheduleController@updateShift');
});


//Ensuring user is logged in
Route::group(['middleware' => 'auth' ], function () {

    // Landing Page
    Route::get('', 'ScheduleController@personalShift');
    //Account details update
    Route::get('/update/user/{id}', 'UserController@singleEdit')->middleware('check');
    Route::post('/update/user/{id}', 'UserController@singleUpdate')->middleware('check');

    //View Order
    Route::get('/view/{id}', 'OrderController@appointment')->middleware('check');

    //View Last Submitted Orders
    Route::get('/submitted', 'OrderController@lastOrder');

    // Calendar View
    Route::get('/calendar', 'OrderController@calendar');

});


Route::get('/gpa', function () {
    return view('gpa');
});

// Contact Form
//Route::get('/contact', 'ContactController@show');
//Route::post('/contact', 'ContactController@mailToAdmin');

Auth::routes();


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
