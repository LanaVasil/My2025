<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

  public function loadRegisterForm(){
    return view("register-form");
  }

  public function registerUser(Request $request){
    // perform validation here
    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'login' => 'required|string|unique:users|min:3|max:32',
        'email' => 'required|string|email|unique:users|min:4|max:255',
        'password' => 'required|min:3|max:100',
    ]);

    try {
      $user = new User;
      $user->name = $request->name;
      $user->login = $request->login;
      $user->email = $request->email;
      $user->password = Hash::make( $request->password );

      // error
      flash('Користувача створено.');

      $user->save();

      return redirect('/registration/form');
      // return redirect('/registration/form')->with('success','You Have been Registered Successfully!');
    } catch (\Exception $e) {
        // error
        flash( $e->getMessage(), 'danger');

        return redirect('/registration/form');
        // return redirect('/registration/form')->with('error',$e->getMessage());

    }
  }

    // create a function to load a login form
    public function loadLoginPage(){
        return view('login-page');
    }

    public function loginUser(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        // now allow user to login if validation was successfully
        try {
            // login logic here
            $userCredentials = $request->only('login','password');

            if(Auth::attempt($userCredentials)){
                // redirect user to home page
                return redirect('/home');
            }else{

                flash('Не вірний імя або пароль', 'danger');

                return redirect('/login/form');
            }
        } catch (\Exception $e) {
            // error
            flash( $e->getMessage(), 'danger');

            return redirect('/login/form');
        }
    }

    // create function to load home page
    public function loadHomePage(){
        return view('user.home-page');
    }

    // perform logout function here
    public function LogoutUser(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('/login/form');
    }

        // create forgot password function here to load a page
    public function forgotPassword(){
        return view('forgot-password');
    }

        // perform email sending logic here
    public function forgot(Request $request){
        // validate here
        $request->validate([
            'email' => 'required'
        ]);
        // check if email exist
        $user = User::where('email',$request->email)->get();

        foreach ($user as $value) {
            # code...
        }

        if(count($user) > 0){
            $token = Str::random(40);
            $domain = URL::to('/');
            $url = $domain.'/reset/password?token='.$token;

            $data['url'] = $url;
            $data['email'] = $request->email;
            $data['title'] = 'Password Reset';
            $data['body'] = 'Please click the link below to reset your password';

            Mail::send('forgotPasswordMail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            // $dataTime = Carbon::now()->format('Y-m-d H:i:s');

            $passwordReset = new PasswordReset;
            $passwordReset->email = $request->email;
            $passwordReset->token = $token;
            $passwordReset->user_id = $value->id;
            // $passwordReset->created_at = $dataTime;
            $passwordReset->save();

            return back()->with('success','please check your mail inbox to reset your password');
        }else{
            return redirect('/forgot/password')->with('error','email does not exist!');
        }

    }

}
