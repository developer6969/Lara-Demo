<?php

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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// Launch on click of dashboard
// All other routes in from here onwards will be Vue-Routes
// and are registered in resources/js/app.js file
// Route::get('/dashboard', function() {
//     return view('dashboard');
// });




// SETTING Default Page By Laravel

// OPTION 1 :
// Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');

// OPTION 2 :
Route::fallback(function () {
    return view('dashboard');
});
