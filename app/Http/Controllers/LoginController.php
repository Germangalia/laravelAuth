<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function postLogin()
    {
        //TODO
        \Debugbar::info("Ok entra a postLogin");
        echo 'login';
    }

    public function getLogin()
    {
        return view('login');
    }
}
