<?php


Route::get('/', function () {
    return view('defaultpage');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/register', 'AdminController@createNewUser')->name('register');
    Route::post('/register', 'AdminController@storeNewUser')->name('create');

    Route::get('users', function () {
        return view('list_user');
    });
    Route::get('list_user_data', 'AdminController@listUsers');

    Route::get('/users/{id}/edit', 'AdminController@editUser')->name('users.edit');
    Route::put('users/{id}', 'AdminController@updateUser')->name('users.update');
    Route::delete('users/{id}', 'AdminController@destroyUser')->name('users.destroy');

    Route::get('/profile', 'AdminController@editProfile')->name('profile.edit');
    Route::put('/profile/update', 'AdminController@updateProfile')->name('profile.update');

    Route::get('tnc/create', function () {
        return view('tnc_create');
    });
    Route::post('tnc/create', 'TncController@create')->name('tnc_create');

    Route::get('tnc/{id}', 'TncController@show');

    Route::get('tncs', function () {
        return view('list_tnc');
    });
    Route::get('list_tnc_data', 'TncController@listTncs');
    Route::get('/tncs/{id}/edit', 'TncController@editTnc')->name('tncs.edit');
    Route::put('tncs/{id}', 'TncController@updateTnc')->name('tncs.update');
    Route::delete('tncs/{id}', 'TncController@destroyTnc')->name('tncs.destroy');

    Route::post('tnc/{id}/access', 'TncController@grantAccess')->name('access.grant');
    Route::put('tncs/{id}/access', 'TncController@updateAccess')->name('accesses.update');
});
