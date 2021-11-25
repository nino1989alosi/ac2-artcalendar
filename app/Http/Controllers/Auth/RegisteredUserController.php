<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Mail;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
       $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|confirmed|min:8',
        ]);

      
        /*Auth::login($user = User::create([
            'name'     => implode(' ', [$request->first_name, $request->last_name]),
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]));*/

        $user = User::create([
            'name'     => implode(' ', [$request->first_name, $request->last_name]),
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $data_email = array('url'=>url('/').'/activate/'.$user->id);

        $this->sendEmail($data_email,$request->email );
        //dd('10');
        //event(new Registered($user));
        
        return redirect(RouteServiceProvider::LOGIN);
    }




    private function sendEmail($data,$email_dest){
        $email_mittente = env('MAIL_USERNAME');
        Mail::send('templates.mail',$data,function($message) use($data,$email_dest,$email_mittente){
            $message->to($email_dest)->subject
            ('Completa attivazione Account');
            $message->from($email_mittente);
        });
    }
}
