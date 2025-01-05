<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }} :: {{ $titlePage ?? 'Page Title app.blade' }}</title>

    <!-- Favicons -->
    <link href="{{ asset('storage/img/favicon.svg')}}" rel="shortcut icon" type="image/x-icon">

    @vite(['resources/sass/app.scss'])
</head>

<body>

    <div id="progress">
        <span id="progress-value">&#xF286;</span>
    </div>

    <main class="main">
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">

                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-3">
                                <a href="{{ route('login') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('storage/img/favicon.svg') }}" alt="Logo">
                                    <span class="d-block">ДУ "ЦОП НПУ"</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card card-entry">

                                <div class="card-body">

                                    <div class="pt-3 pb-2">
                                        <h5 class="card-title text-center fs-4">
                                            @yield('title', '')
                                        </h5>
                                    </div>

                                    <!-- Флеш повідомлення (показати і після цього видалили з сесії). -->
                                    @include('includes.flash')

                                    @yield('content')

                                </div>
                            </div>

                        </div>

            </section>

        </div>
    </main>

    @vite(['resources/js/app.js'])

</body>

</html>
