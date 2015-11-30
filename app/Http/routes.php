<?php

Route::get('/login',
    ['as' => 'auth.login',
     'uses' => 'LoginController@getLogin'
    ]);
Route::post('/postLogin', [
    'as' => 'auth.postLogin',
    'uses' => 'LoginController@postLogin']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', ['as' => 'auth.home', function () { return view('home'); }]);

Route::get('/resource', ['as' => 'resource', 'middleware' => 'auth', function () {
    return view('resource');
}]);

//Route::get('/patata', ['as' => 'patata', 'middleware' => 'auth', 'uses' => 'PatataController@getPatata']);

//Route::get('/exemple', ['as' => 'exemple', 'middleware' => 'auth', 'uses' => 'ExempleController@getExemple']);

Route::get('/flushSession',
    ['as' => 'session.flush',
     function() {
            Session::flush();
    }]
);

Route::get('/register',
    ['as' => 'auth.register',
        'uses' => 'RegisterController@getRegister']
);

Route::post('/register',
    ['as' => 'auth.postRegister',
        'uses' => 'RegisterController@postRegister']
);

Route::post('/checkEmailExists',
    ['as' => 'checkEmailExists',
        'uses' => 'ApiController@checkEmailExists']
);