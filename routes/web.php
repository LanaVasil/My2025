<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/registration/form',[AuthController::class,'loadRegisterForm']);
Route::post('/register/user',[AuthController::class,'registerUser'])->name('registerUser');

Route::get('/login/form',[AuthController::class,'loadLoginPage']);
Route::post('/login/user',[AuthController::class,'loginUser'])->name('loginUser');

Route::get('/home',[AuthController::class,'loadHomePage']);

Route::get('/logout',[AuthController::class,'LogoutUser']);

Route::get('/forgot/password',[AuthController::class,'forgotPassword']);
Route::post('/forgot',[AuthController::class,'forgot'])->name('forgot');


Route::middleware(['auth', 'verified'])->group(function () {
  // сторінка на яку переходить зареєстрований та авторізований(залогінений) користувач
  Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

});



Route::middleware('guest')->group(function () {
  Route::get('register', [UserController::class, 'create'])->name('register');
  Route::post('register', [UserController::class, 'store'])->name('user.store');

  Route::get('login', [UserController::class, 'login'])->name('login');
  Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');

  // відновлення пароля
  Route::get('forgot-password', function () {
    return view('user.forgot-password');
  })->name('password.request');

  Route::post('forgot-password', [UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');

  Route::get('reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
  })->name('password.reset');

  Route::post('reset-password', [UserController::class,'resetPasswordUpdate'])->name('password.update');

//   зразок - потім прибрати
  Route::get('dashboard_isx', [UserController::class, 'dashboard'])->name('dashboard_isx');

});


Route::middleware('auth')->group(function () {

  Route::get('logout', [UserController::class, 'logout'])->name('logout');

  // маршрути для Реєстрації / Авторізації
  // 1 відповідає за повідомлення на сторінці
  Route::get('verify-email', function () {
    return view('user.verify-email');
  })->name('verification.notice');

  // 2 відповідає за підтверження користувача при переході по посиланню
  Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
  })->middleware('signed')->name('verification.verify');

  // 3 відповідає за повторне відправлення листа
  Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Посилання для підтвердження надіслано!');
  })->middleware('throttle:3,1')->name('verification.send');

});
