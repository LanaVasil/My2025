<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }} :: {{ $titlePage ?? 'Page Title app.blade' }}</title>

  {{-- <meta content="" name="description">
  <meta content="" name="keywords"> --}}

  <!-- Favicons -->
  <link href="{{ asset('storage/img/favicon.svg')}}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('storage/img/logo.svg')}}" rel="apple-touch-icon">

  @vite(['resources/sass/app.scss'])
</head>

<body>

  <main class="main">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="container">
          <div class="row justify-content-center">
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
                    {{-- <p class="text-center small">Enter your username & password to login</p> --}}
                  </div>

                  <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
                  @include('includes.flash')

                  @yield('content')

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @vite(['resources/js/app.js'])

</body>

</html>
