<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class RegisterController extends Controller
{
    public function getRegister() {
        return view('register');
    }

    public function postRegister() {

        //dd(Input::all());

        $user = new User();

        $user->name = Input::get('name');
        $user->password = bcrypt(Input::get('password'));
        $user->email = Input::get('email');

        $user->save();

        //User::create(Input::all());
    }
}
