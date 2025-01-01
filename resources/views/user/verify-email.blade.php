@extends('components.layouts.entry')

@section('title', Auth::user()->name.", дякуємо за реєстрацію!")

@section('content')

    <div class="alert alert-success" role="alert">
        {{-- <h4 class="alert-heading">{{ Auth::user()->name }}, дякуємо за реєстрацію!</h4> --}}
        <p class="mb-0">На електронну адресу <strong>{{ Auth::user()->email }}</strong> було надіслано листа.</p>
        <p class="mb-0">Обов'язково перевірте поштову скриньку і завершіть процес реєстрації.</p>
        <hr>
        <p class="mb-0">Примітка: Якщо ви не отримаєте електронний лист через кілька хвилин:</p>
        <p class="mb-0">- перевірте папку зі спамом</p>
        <p class="mb-0">- перевірте, чи правильно ви вказали адресу електронної пошти.</p>
    </div>

    <p>Ще не отримали підтвердження? </p>
    <x-forms.form action="{{ route('verification.send') }}" method="POST">

        <div class="col-12">
           <x-button class="w-100" label="{{ __('Повторити відправлення') }}"/>
        </div>

    </x-forms.form>

    <div class="col-12 mt-3 d-flex justify-content-between">
        <a href="{{ route('login') }}" class="card-link">Логін</a>
        <a href="{{ route('register') }}"  class="card-link">Реєстрація</a>
    </div>

@endsection
