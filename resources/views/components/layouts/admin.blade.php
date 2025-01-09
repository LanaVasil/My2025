<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="autor" content="Vasilyeva Svitlana">

    <title>{{ config('app.name') }} :: {{ $titlePage ?? 'Page Title app.blade' }}</title>


    <!-- Favicons -->
    <link href="{{ asset('storage/img/favicon.svg')}}" rel="shortcut icon" type="image/x-icon">
    {{-- <link href="{{ asset('storage/img/logo.svg')}}" rel="apple-touch-icon"> --}}

    @vite(['resources/sass/app.scss'])
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="progress">
        <span id="progress-value">&#xF286;</span>
    </div>

    <div class="wrapper">

        <livewire:admin-nav-bar/>

        <!-- ======= Main ======= -->
        <main id="main" class="main">

            {{ $slot }}

        </main><!-- End #main -->
        <!-- ======= ./Main ======= -->

        <!-- ======= Footer ======= -->
        @include('includes.footer')
        <!-- ======= ./Footer ======= -->

    </div>

    @vite(['resources/js/app.js'])

</body>

</html>

