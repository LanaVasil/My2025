<header class="header fixed-top">

  <nav class="navbar navbar-expand-lg top-navbar" >
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('storage/img/favicon.svg') }}" alt="Logo">
            <span class="d-none d-sm-block">ДУ "ЦОП НПУ"</span>
        </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Переключить навигацию">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="offcanvas offcanvas-start" id="offcanvasNavbar">

        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ДУ ЦОП</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
        </div>


        <div class="offcanvas-body">
        <ul class="navbar-nav me-lg-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown has-megamenu">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Напрямки
            </a>
            <div
              class="container dropdown-menu megamenu"
              role="menu"
            >
              <div class="row g-3">
                <div class="col-lg-3 col-sm-6">
                  <h6 class="title">Электронные замки</h6>
                  <ul class="list-unstyled">
                    <li><a href="#">Врезные замки</a></li>
                    <li><a href="#">Замки для квартиры</a></li>
                    <li><a href="#">Замки для дома</a></li>
                    <li><a href="#">Замки для отелей</a></li>
                    <li><a href="#">Замки для офиса</a></li>
                    <li><a href="#">Замки для шкафчиков</a></li>
                  </ul>
                </div>
                <!-- end col-3 -->

                <div class="col-lg-3 col-sm-6">
                  <h6 class="title">Механические замки</h6>
                  <ul class="list-unstyled">
                    <li><a href="#">Врезные замки</a></li>
                    <li><a href="#">Замки для квартиры</a></li>
                    <li><a href="#">Замки для дома</a></li>
                    <li><a href="#">Замки для отелей</a></li>
                  </ul>
                </div>
                <!-- end col-3 -->

                <div class="col-lg-3 col-6">
                  <h6 class="title">Декоративные замки</h6>
                  <ul class="list-unstyled">
                    <li><a href="#">Врезные замки</a></li>
                    <li><a href="#">Замки для квартиры</a></li>
                    <li><a href="#">Замки для дома</a></li>
                    <li><a href="#">Замки для отелей</a></li>
                    <li><a href="#">Замки для офиса</a></li>
                    <li><a href="#">Замки для шкафчиков</a></li>
                    <li><a href="#">Замки для шкафчиков</a></li>
                  </ul>
                </div>
                <!-- end col-3 -->

                <div class="col-lg-3 col-6">
                  <h6 class="title">Сервіс</h6>
                  <ul class="list-unstyled">
                    <li><a wire:navigate href="/counter">Counter</a></li>
                    <li><a href="#">Замки для квартиры</a></li>
                    <li><a href="#">Замки для дома</a></li>
                    <li><a href="#">Замки для отелей</a></li>
                    <li><a href="#">Замки для офиса</a></li>
                    <li><a href="#">Замки для шкафчиков</a></li>
                  </ul>
                </div>
                <!-- end col-3 -->
              </div>
            </div>
            <!-- ./dropdown-mega-menu -->
          </li>

          <li class="nav-item">
            <a wire:navigate class="{{request()->is('users')?'nav-link active':'nav-link'}}"  href="/users">User</a>
        </li>


        <li class="nav-item">
          <a wire:navigate class="{{request()->is('register')?'nav-link active':'nav-link'}}" href="/register">{{ __('Register') }}</a>
        </li>
        <li class="nav-item">
          <a wire:navigate class="{{request()->is('brands')?'nav-link active':'nav-link'}}" href="/brands">{{ __('Бренди') }}</a>
        </li>
        {{-- <li class="nav-item">
          <a wire:navigate class="{{request()->is('devices')?'nav-link active':'nav-link'}}" href="/devices">{{ __('Пристрої') }}</a>
        </li> --}}
        <li class="nav-item">
          <a wire:navigate class="nav-link {{ active_link(['devices*']) }}" href=" {{route('devices')}}">{{ __('Пристрої') }}</a>
          {{-- <a wire:navigate class="nav-link {{ active_link(['devices','devices.add','devices.edit']) }}" href=" {{route('devices')}}">{{ __('Пристрої') }}</a> --}}
        </li>

        </ul>
        </div> <!-- ./offcanvas-body -->

      </div>
      <!-- ./offcanvas offcanvas-start -->

      <div class="navbar-side">
        <ul>
          <li>
            <button type="button" class="btn btn-light rounded-pill position-relative">
              <i class="bi bi-balloon-heart"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                105
                <span class="visually-hidden">unread messages</span>
              </span>
            </button>
          </li>
          <li>
            <button type="button" class="btn btn-light rounded-pill position-relative">
              <i class="bi bi-handbag"></i>
              <span class="position-absolute translate-middle badge rounded-pill bg-warning">
                99+
                <span class="visually-hidden">unread messages</span>
              </span>
            </button>
          </li>


          <li class="dropdown">
            <a href="#" class="dropdown-toggle " data-bs-toggle="dropdown">
                <i class="bi bi-person"></i><span>{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">

               <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>Посада</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
              <li><a wire:navigate href="#" class="dropdown-item">
                <span>{{ __('Особистий кабінет') }}</span></a></li>
              <li><a wire:navigate href="{{ route('register') }}" class="dropdown-item">
          <span>{{ __('Реєстрація') }}</span></a></li>
              <li><a wire:navigate href="{{ route('logout') }}" class="dropdown-item">
            <span>{{ __('Вихід') }}</span></a></li>
            </ul>
          </li>
        </ul>

        <form action="" class="search-form">
          <input
            class="form-control"
            type="text"
            name="s"
            placeholder="Пошук ..."
            required
          />
          <button class="search-form-btn"  id="search-form-btn" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
      <!-- ./navbar-side -->
    </div>
  </nav>

</header>


