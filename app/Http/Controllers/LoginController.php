<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        //TODO
        //dd($request->all);
        //\Debugbar::info("Ok entra a postLogin");
        //echo 'login';

        if ($this->login($request->email, $request->password)){
            //REDIRECT TO HOME
            return redirect()->route('home');
        }else{
            //REDIRECT BACK
            return redirect()->route('login');
        }
    }

    public function getLogin()
    {
        return view('login');
    }

    private function login($email, $password){
        //TODO: Mirar bé la base de dades
        return true;
    }
}
