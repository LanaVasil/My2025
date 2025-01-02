@extends('components.layouts.entry')

@section('title', 'Забули пароль?')

@section('content')

    <div class="entry__wrapper">
        <small>Надішлимо електроний лист із посилання для зміни пароля.
        </small>
    </div>

    <x-forms.form action="{{ route('password.email') }}" method="POST">

        <x-input-with-tag name="email" type="email" placeholder="Eлектрона пошта (від 4 до 255)" bi="bi bi-envelope-at" value="{{ old('email') }}" autofocus/>

        <div class="col-12">
           <x-button class="btn-login w-100" label="{{ __('Надіслати') }}"/>
        </div>

    </x-forms.form>

    <div class="col-12 mt-3 d-flex justify-content-between">
        <a href="{{ route('login') }}" class="card-link">Логін</a>
        <a href="{{ route('register') }}"  class="card-link">Реєстрація</a>
    </div>


@endsection
