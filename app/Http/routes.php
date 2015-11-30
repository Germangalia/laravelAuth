<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' =>'auth'], function() {

    Route::get('/resource', ['as' => 'resource', 'middleware' => 'auth', function () {
        return view('resource');
    }]);

    Route::get('/home', ['as' => 'auth.home', function () { return view('home'); }]);
});




//Route::get('/patata', ['as' => 'patata', 'middleware' => 'auth', 'uses' => 'PatataController@getPatata']);

//Route::get('/exemple', ['as' => 'exemple', 'middleware' => 'auth', 'uses' => 'ExempleController@getExemple']);

Route::get('/phpinfo', function () { return phpinfo(); });

Route::get('/flushSession',
    ['as' => 'session.flush',
     function() {
            Session::flush();
    }]
);


Route::post('/checkEmailExists',
    ['as' => 'checkEmailExists',
        'uses' => 'ApiController@checkEmailExists']
);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');