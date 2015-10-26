<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/resource', function () {

    $authenticated = false;
    Session::set('authenticate', true);
    //dd(\Session::all);
    \Debugbar::info("Xivato 1");
    \Debugbar::info(Session::all());
    if(Session::has('authenticated')) {
        if(Session::get('authenticated') == true) {
            $authenticated = true;
        }
    }

    if($authenticated){
        return view('resource');
    } else {
        return view('login');
    }

});
