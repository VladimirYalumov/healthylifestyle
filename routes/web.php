<?php

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales')))
    {
        # Проверяем, что у пользователя выбран доступный язык
        Session::put('locale', $locale);                    # И устанавливаем его в сессии под именем locale
    }
    return redirect()->back();                              # Редиректим его <s>взад</s> на ту же страницу
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coach', function () {
    return view('coach');
})->name("coach")->middleware('can:create_programm');

Route::get('/users_list', 'AdminController@showUsers')->name("users_list")->middleware('can:create_programm');
Route::post('/delete_user', 'AdminController@deleteUser')->name("delete_user")->middleware('can:create_programm');

Route::get('/coach', function () {
    return view('coach');
})->name("coach")->middleware('can:create_programm');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/programs', 'ProgrammController@findAll')->name('programs');

Route::post('/createprogram', 'ProgrammController@create')->name('createprogram')->middleware('can:create_programm');

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
