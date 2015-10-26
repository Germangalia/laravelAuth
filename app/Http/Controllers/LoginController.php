<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * Process a login HTTP POST
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Get Login
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('login');
    }

    /**
     * Login
     *
     * @param $email
     * @param $password
     * @return bool
     */
    private function login($email, $password){
        //TODO: Mirar bé la base de dades
        return true;
    }
}
