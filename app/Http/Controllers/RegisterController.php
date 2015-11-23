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

    public function postRegister(Request $request) {

        //dd(Input::all());

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();

        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        $user->email = $request->get('email');

        $user->save();

        $this->email = $request->get('email');
        $this->name = $request->get('name');

        $this->sendRegisterEmail();

        //User::create(Input::all());
        //User::create(request->all());

        return redirect()->route('auth.login');
    }

    public function sendRegisterEmail(){

        $emailData = new \stdClass();

        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "welcome user" . $this->name;
        //$emailData->pathToFile = '/home/ggalia84/Imágenes/authentication_1.png';

        //$emailData->footer = "welcome user" . $this->footer;
        //$emailData->header = "welcome user" . $this->header;

        //$data = "HOLA";
        $data['name'] = $this->name;
        $data['var2'] = "Valor2";

        \Mail::send('emails.message', $data, function($message) use ($emailData){
            $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);
            //$message->attach($emailData->pathToFile);
        });

    }
}
