<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="autor" content="{{$metaAutor ?? 'Vasilyeva Svitlana'}}">

    <title>{{ config('app.name') }} :: {{ $titlePage ?? 'Page Title app.blade' }}</title>

    <!-- Favicons -->
    <link href="{{ asset('storage/img/favicon.svg')}}" rel="shortcut icon" type="image/x-icon">

    @vite(['resources/sass/app.scss'])
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}    
</head>

<body>

    <div id="progress">
        {{-- <span id="progress-value">&#x1F815;</span> --}}
        <span id="progress-value">&#xF286;</span>
    </div>

    <div class="wrapper">
  {{-- <header id="header" class="header fixed-top d-flex align-items-center"> --}}
  {{-- <header id="header" class="header d-flex align-items-center">
    header
  </header> --}}

        <livewire:nav-bar/>


        <!-- ======= Main ======= -->
        <main id="main" class="main">
            <div class="main__container">
              @include('includes.breadcrumbs')
            
              <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
              @include('includes.flash')

              {{ $slot }}

            </div>
        </main><!-- End #main -->
        <!-- ======= ./Main ======= -->


        <!-- ======= Footer ======= -->
        @include('includes.footer')
        <!-- ======= ./Footer ======= -->

    </div>

    @vite(['node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'resources/js/app.js'])

</body>

</html>
