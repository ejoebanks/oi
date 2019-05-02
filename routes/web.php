<?php

Route::group(['middleware' => 'admin'], function () {

    //Admin Page
    Route::get('/admin', 'AdminController@adminPage');

    //CRUDS
    Route::resource('users', 'UserController');
    Route::resource('shifts', 'ShiftController');
    Route::resource('events', 'EventController');
    Route::resource('staff', 'StaffController');
    Route::resource('shiftchanges', 'ShiftChangeController');

    //Recent Changes
    Route::get('/changes', 'ShiftChangeController@recent');

    // Viewing & Updating shifts
    Route::get('/lists', 'ShiftController@listShifts');
    Route::post('/lists', 'ShiftController@listShifts');
    Route::get('/lists/{id}/{char}', 'ShiftController@updateShift');

    //Org Chart Functions
    Route::get('/orgchart', 'ShiftController@shiftspread');
    Route::get('/orgchart/send', 'ShiftController@sendChart');
    Route::get('/orgchart/download', 'ShiftController@export');
    Route::get('/orgchart/scheduling', 'StaffController@exportScheduling');


    Route::post('/calendar/remove', 'EventController@removeEvent');
    Route::post('/calendar/create', 'EventController@updateEvent');
    Route::post('/calendar/drop', 'EventController@updateDate');

    Route::post('import', 'StaffController@import')->name('import');

});


//Ensuring user is logged in
Route::group(['middleware' => ['auth', 'verified']], function () {

    //Account details update
    Route::get('/update/user/{id}', 'UserController@singleEdit')->middleware('check');
    Route::post('/update/user/{id}', 'UserController@singleUpdate')->middleware('check');

    //View Order
    Route::get('/view/{id}', 'OrderController@appointment')->middleware('check');

    // Calendar View
    Route::get('/calendar', 'EventController@all');

    //Home Page
    Route::get('', 'HomeController@homepage');
});


Route::get('/gpa', function () {
    return view('gpa');
});

Auth::routes(['verify' => true]);

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

Auth::routes(['verify' => true]);
