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

    Route::get('/home', function () {
        return view('home');
    });

    //Recent Changes
    Route::get('/changes', 'ShiftChangeController@recent');

    // Viewing & Updating shifts
    Route::get('/lists', 'ShiftController@listShifts');
    Route::post('/lists', 'ShiftController@listShifts');
    Route::get('/lists/{id}/{char}', 'ShiftController@updateShift');

    //Assigning a shift
    Route::get('/unassigned', 'ShiftController@unassignedEmployees');

    //Org Chart Functions
    Route::get('/orgchart', 'ShiftController@shiftspread');
    Route::get('/orgchart/send', 'ShiftController@sendChart');
    Route::get('/orgchart/download', 'ShiftController@export');
});


//Ensuring user is logged in
Route::group(['middleware' => 'auth' ], function () {

    //Account details update
    Route::get('/update/user/{id}', 'UserController@singleEdit')->middleware('check');
    Route::post('/update/user/{id}', 'UserController@singleUpdate')->middleware('check');

    //View Order
    Route::get('/view/{id}', 'OrderController@appointment')->middleware('check');

    //View Last Submitted Orders
    Route::get('/submitted', 'OrderController@lastOrder');

    // Calendar View
    Route::get('/calendar', 'EventController@all')->middleware('verified');
    Route::post('/calendar', 'EventController@updateEvent');
    Route::post('/calendar/remove', 'EventController@removeEvent');
    Route::post('/calendar/create', 'EventController@updateEvent');
    Route::post('/calendar/drop', 'EventController@updateDate');
    Route::get('', 'HomeController@homepage');
});


Route::get('/gpa', function () {
    return view('gpa');
});

// Contact Form
//Route::get('/contact', 'ContactController@show');
//Route::post('/contact', 'ContactController@mailToAdmin');
Route::get('/test/download', function () {
    return view('testpage');
});


Route::get('/test', 'ShiftController@shiftspread2');

Route::get('/testchart', 'ShiftController@shiftspread2');
Route::get('/testchart/download', 'ShiftController@shiftspread2');


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
