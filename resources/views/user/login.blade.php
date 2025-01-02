@extends('components.layouts.entry')

@section('title', 'Логін')

@section('content')
    <x-forms.form action="{{ route('login.auth')}}" method="POST">

        <x-input-with-tag name="login" label="Логін" placeholder="Логін (від 3 до 32)" bi="bi bi-box-arrow-in-right" value="{{ old('login') }}"/>
        <x-input-with-tag name="password"  type="password" placeholder="Пароль" bi="bi bi-key"/>

        <div class="col-12">
            <x-check-input name="remember" label="{{ __('Запам`ятати мене') }}"/>
        </div>

        <div class="col-12">
           <x-button class="btn-login w-100" label="{{ __('До роботи') }}"/>
        </div>

    </x-forms.form>

    <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
        <a href="{{ route('password.request') }}" class="card-link">Забули пароль?</a>
        <a href="{{ route('register') }}"  class="card-link">Реєстрація</a>
    </div>

@endsection

