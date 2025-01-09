<?php

// role:
// user
// author
// editor
// pro - customer[клієнт]
// boss
// admin

use App\Http\Controllers\User\BrandsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Livewire\Devices\DeviceTable;
// use App\Livewire\Devices\DeviceAdd;
use App\Livewire\Devices\DeviceEdit;

// Admin
use App\Livewire\AdminOverview;

// PRO
use App\Livewire\Comp\Devices\ProDevices;
use App\Livewire\Comp\Devices\ProDeviceShow;

use App\Livewire\Admin\Comp\Brands;
use App\Livewire\Admin\Comp\DeviceAdd;
use App\Livewire\Admin\Comp\OrderManagement;

// use App\Livewire\Pro\Comp\DevicesCart;
// use App\Livewire\Pro\Comp\DeviceShow;
// use App\Livewire\Pro\Comp\DevicesList;

use App\Http\Controllers\BrandController;

// use Illuminate\Support\Facades\Password;


Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/admin/dashboard', AdminOverview::class)->name('admin.dashboard');

// напрямок Computer



    // Route::get('/admin/brands', Brands::class)->name('admin.brands');
    // Route::get('/admin/device/add', DeviceAdd::class)->name('admin.device.add');
    Route::get('/admin/orders', OrderManagement::class)->name('admin.orders');

    Route::get('/pro/devices', ProDevices::class)->name('pro.devices');
    Route::get('/pro/device/{id}', ProDeviceShow::class)->name('pro.device.show');


});



Route::middleware(['auth', 'verified'])->group(function () {
// сторінка на яку переходить зареєстрований та авторізований(залогінений) користувач
//   Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
 Route::get('home', [UserController::class, 'home'])->name('home');

// Route::get('/devices', DeviceList::class)->name('devices');
// Route::get('/devices', DeviceTable::class)->name('devices');
//   Route::get('/devices/add', DeviceAdd::class)->name('devices.add');
// Route::get('/devices/edit', DeviceEdit::class)->name('devices.edit');

// PANEL ADMIN
Route::get('admin/dashboard', AdminOverview::class)->name('admin.dashboard');

// PANEL PRO - profesional
Route::get('/brand/{id}', [BrandController::class,'index'])->name('brand.show');

// Route::get('/list', DevicesList::class)->name('devices.list');
// Route::get('/device/{id}', DeviceShow::class)->name('device.show');

// Route::middleware(['auth', 'verified','rolemanager:customer'])->group(function () {
// Route::get('/cart', DevicesCart::class)->name('cart');
// ./PANEL PRO - profesional

  // Route::get('devices', [UserController::class, 'devices'])->name('devices');


//   Route::get('/dashboard', function(): Factory|View {
//     return view('dashboard');
//   })->middleware('rolemanager:customer')->name('dashboard');
//   Route::get('/admin/dashboard', function(): Factory|View {
//     return view('admin');
//   })->middleware('rolemanager:admin')->name('admin');
});


Route::middleware('guest')->group(function () {
  Route::get('/register', [UserController::class, 'create'])->name('register');
  Route::post('/register', [UserController::class, 'store'])->name('user.store');

  Route::get('/login', [UserController::class, 'login'])->name('login');
  Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');

  // відновлення пароля
  Route::get('/forgot-password', function () {
    return view('user.forgot-password');
  })->name('password.request');

  Route::post('/forgot-password', [UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');

  Route::get('/reset-password/{token}', function (string $token) {
    return view('user.reset-password', ['token' => $token]);
  })->name('password.reset');

  Route::post('/reset-password', [UserController::class,'resetPasswordUpdate'])->name('password.update');

});


Route::middleware('auth')->group(function () {

  Route::get('/logout', [UserController::class, 'logout'])->name('logout');

  // маршрути для Реєстрації / Авторізації
  // 1 відповідає за повідомлення на сторінці
  Route::get('/verify-email', function () {
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
