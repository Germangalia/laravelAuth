<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('auth.home');
        }else{
            //REDIRECT BACK
            return redirect()->route('auth.login');
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

        //$user = User::findOrFail(id);
        //$user = User::all();
        $user = User::where('email', $email)->first();
        if(Hash::check($password, $user->password)) {
            return true;
        }else {
            return false;
        }
    }

}
