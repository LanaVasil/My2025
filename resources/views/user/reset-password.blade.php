@extends('components.layouts.entry')

@section('title', 'Змінити пароль')

@section('content')
    <x-forms.form action="{{ route('password.update') }}" method="POST">

        <input type="hidden" name="token" value="{{ $token }}">

        <x-input-with-tag name="email" type="email" placeholder="Eлектрона пошта (від 4 до 255)" bi="bi bi-envelope-at" value="{{ old('email') }}"/>

        <x-input-with-tag name="password"  type="password" placeholder="Пароль (від 3 до 100)" bi="bi bi-key"/>
        <x-input-with-tag name="password_confirmation" type="password" placeholder="Пароль ще раз" bi="bi bi-key-fill"/>

        <div class="col-12">
           <x-button class="w-100" label="{{ __('Зберегти') }}"/>
        </div>

        <div class="col-12 mt-3 mb-3 d-flex justify-content-between">
            <a href="{{ route('login') }}" class="card-link">Логін</a>
            <a href="{{ route('register') }}"  class="card-link">Реєстрація</a>
        </div>

    </x-forms.form>


@endsection
