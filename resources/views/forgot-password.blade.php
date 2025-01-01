<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Логін</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('storage/img/favicon.svg')}}" rel="icon">
  <link href="{{ asset('storage/img/logo.svg')}}" rel="apple-touch-icon">


  <!-- Vendor CSS Files -->
  {{-- <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> --}}
  {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/export-excel.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('row_merger/dist/row-merge-bundle.min.js') }}"></script> --}}

  <!-- Template Main CSS File -->

  @vite(['resources/sass/app.scss'])
  {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('storage/img/logo.svg') }}" alt="">
                  <span>ДУ "ЦОП НПУ"</span>
                  {{-- <span class="d-none d-lg-block">ДУ "ЦОП НПУ"</span> --}}
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Вiдновлення пароля</h5>
                    {{-- <p class="text-center small">Enter your personal details to create account</p> --}}
                  </div>

                  <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
                  @include('includes.flash')

                  <form class="row g-3" action="{{ route('forgot')}}" method="POST">
                    @csrf

                    <x-input-with-tag name="login" label="Логін" placeholder="Логін" bi="bi bi-box-arrow-in-right" value="{{ old('login') }}"/>

                    <x-input-with-tag name="email" type="email" placeholder="Eлектрона пошта при реєстрації" bi="bi bi-envelope-at" value="{{ old('email') }}"/ />


                    <div class="col-12">
                      <button class="btn btn-outline-warning w-100" type="submit">Надіслати</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Ви не зареєстровані? <a href="/registration/form">До реєстрації</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  {{-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> --}}


  @vite(['resources/js/app.js'])

  <!-- Template Main JS File -->
  {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}

</body>

</html>
