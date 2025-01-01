<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
  public function devices()
  {
    return view('devices.devices');
  }
  public function create()
  {
    return view('user.create');
  }

  public function store(Request $request)
  {

    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'login' => 'required|string|unique:users|min:3|max:32',
        'email' => 'required|string|email|unique:users|min:4|max:255',
        'password' => 'required|min:3|max:100|confirmed',
    ]);

    try {
      $user = User::create($request->all());
      event(new Registered($user));
      // login (Аутентифікація) користувача
      // Аутентифікація – це підтвердження того, ким є користувач на вході. Це проходження перевірки автентичності.
      // Авторизація – це те, що користувачу дозволяється робити після входу. Це надання і перевірка прав на вчинення будь-яких дій в системі.

      Auth::login($user);

      // return redirect()->route('register')->with(flash('Користувача створено.'));
      return redirect()->route('verification.notice');

    } catch (\Exception $e) {
        // error
        return redirect()->route('register')->with(flash( $e->getMessage(), 'danger'));
    }
    // dd($request->all());
  }

  public function login()
  {
    return view('user.login');
  }

  public function loginAuth(Request $request): RedirectResponse
  {
    // dump($request->boolean('remember'));
    // dd($request->all());


    $credentials = $request->validate([
      'login' => ['required'],
      'password' => ['required'],
    ]);

    // 'is_active'=>'1'
    if (Auth::attempt($credentials, $request->boolean('remember'))) {
      // перестворення/ утворення нової сесії для користувача
      $request->session()->regenerate();
      return redirect()->intended('dashboard')->with(flash('Вітаю! ' . Auth::user()->name . 'до роботи!','info'));
    }

    //   return back()->withErrors([
    //     'email' => 'The provided credentials do not match our records.',
    // ])->onlyInput('email');

    // return back()->withErrors([
    //   'email' => 'Йой, то шо таке не таке. Невірний логін або пароль.'
    // ]);
    return back()->with(flash( 'Йой, то шо таке не таке. Невірний логін або пароль.', 'danger') );

  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }

  // краще створити окремий контролер під адмінку
  public function dashboard()
  {
    return view('user.dashboard');
  }

// відправка пароля на email
public function forgotPasswordStore(Request $request){
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink(
      $request->only('email')
  );

  return $status === Password::RESET_LINK_SENT
              // ? back()->with(['sent' => __($status)])
              ? back()->with(['success' => __($status)])
              : back()->withErrors(['email' => __($status)]);
}

public function resetPasswordUpdate(Request $request){

    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:3|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with(flash(__($status)))
                : back()->withErrors(['email' => [__($status)]]);
}

}
