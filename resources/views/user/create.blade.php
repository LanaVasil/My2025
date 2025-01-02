{{-- Create form --}}
@extends('components.layouts.entry')

@section('title', 'Реєстрація')

@section('content')
    <x-forms.form action="{{ route('user.store')}}" method="POST">

        <x-input-with-tag name="name" placeholder="Прізвище та ініціали (від 3 до 255)" bi="bi bi-person" value="{{ old('name') }}"  autofocus=true />
        <x-input-with-tag name="login" label="Логін" placeholder="Логін (від 3 до 32)" bi="bi bi-box-arrow-in-right" value="{{ old('login') }}"/>
        <x-input-with-tag name="email" type="email" placeholder="Eлектрона пошта (від 4 до 255)" bi="bi bi-envelope-at" value="{{ old('email') }}"/>

        <x-input-with-tag name="password"  type="password" placeholder="Пароль (від 3 до 100)" bi="bi bi-key"/>
        <x-input-with-tag name="password_confirmation" type="password" placeholder="Пароль ще раз" bi="bi bi-key-fill"/>

        <div class="col-12">
           <x-button class="btn-login w-100" label="{{ __('Розпочати') }}"/>
        </div>

    </x-forms.form>

    <div class="col-12 mt-3">
        <a href="{{ route('login') }}"  class="card-link">{{ __('Вже зареєстровані?') }}</a>
    </div>
@endsection
