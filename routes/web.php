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

Route::get('/coach', function () {
    return view('coach');
})->name("coach")->middleware('can:create_programm');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/programs', 'ProgrammController@findAll')->name('programs');

Route::get('/createprogramm', 'ProgrammController@create')->name('createprogramm')->middleware('can:create_programm');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/roles', function(){
    $user = \Illuminate\Support\Facades\Auth::user();

    return response()->json(['roles' => $user->roles]);
});
