<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Livewire\Devices\DeviceTable;
use App\Livewire\Devices\DeviceAdd;
use App\Livewire\Devices\DeviceEdit;
// use Illuminate\Support\Facades\Password;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
  // сторінка на яку переходить зареєстрований та авторізований(залогінений) користувач
//   Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
  Route::get('home', [UserController::class, 'home'])->name('home');

//   Route::get('/devices', DeviceTable::class)->name('devices');
//   Route::get('/devices/add', DeviceAdd::class)->name('devices.add');
//   Route::get('/devices/edit', DeviceEdit::class)->name('devices.edit');

   Route::get('devices', [UserController::class, 'devices'])->name('devices');
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
    return redirect()->route('home');
  })->middleware('signed')->name('verification.verify');

  // 3 відповідає за повторне відправлення листа
  Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Посилання для підтвердження надіслано!');
  })->middleware('throttle:3,1')->name('verification.send');

});
