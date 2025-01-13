<header class="header">


  <nav class="navbar navbar-expand-lg top-navbar">
      <div class="container">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('storage/img/favicon.svg') }}" alt="Logo">
          <span class="d-none d-sm-block">ДУ "ЦОП НПУ"</span>
      </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="offcanvas offcanvas-start" id="offcanvasNavbar">

              <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ДУ "ЦОП НПУ"</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>

              <div class="offcanvas-body">
                  <ul class="navbar-nav me-lg-auto mb-2 mb-lg-0">
                      <li class="nav-item dropdown has-megamenu">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              Напрямки
                          </a>
                          <div class="container dropdown-menu megamenu animate slideIn" role="menu">
                              <div class="row g-3">
                                  <div class="col-lg-3 col-6">
                                      <h6 class="title">Электронные замки</h6>
                                      <ul class="list-unstyled">
                                          <li><a href="#">Врезные замки</a></li>
                                          <li><a href="#">Замки для квартиры</a></li>
                                          <li><a href="#">Замки для дома</a></li>
                                          <li><a href="#">Замки для отелей</a></li>
                                          <li><a href="#">Замки для офиса</a></li>
                                          <li><a href="#">Замки для шкафчиков</a></li>
                                      </ul>
                                  </div><!-- end col-3 -->

                                  <div class="col-lg-3 col-6">
                                      <h6 class="title">Механические замки</h6>
                                      <ul class="list-unstyled">
                                          <li><a href="#">Врезные замки</a></li>
                                          <li><a href="#">Замки для квартиры</a></li>
                                          <li><a href="#">Замки для дома</a></li>
                                          <li><a href="#">Замки для отелей</a></li>
                                      </ul>
                                  </div><!-- end col-3 -->

                                  <div class="col-lg-3 col-6">
                                    <h6 class="title">{{ __('Комп\'ютери') }} </h6>
                                    <ul class="list-unstyled">
                                      {{-- <li>
                                          <a wire:navigate href="{{ route('devices') }}">
                                              {{ __('Довідник пристроїв') }}
                                          </a>
                                      </li> --}}
                                      {{-- <li>
                                          <a wire:navigate href="{{ route('devices') }}">
                                              {{ __('Види пристроїв') }}
                                          </a>
                                      </li> --}}
                                      <li>
                                          <a wire:navigate href="{{ route('admin.brands') }}">
                                              {{ __('Довідник брендів') }}
                                          </a>
                                      </li>
                                      {{-- <li>
                                          <a wire:navigate href="{{ route('admin.device.add') }}">
                                              {{ __('Довідник пристроїв add') }}
                                          </a>
                                      </li> --}}
                                      <li>
                                        <a wire:navigate href="{{ route('pro.devices') }}">
                                            {{ __('Довідник пристроїв. Пакування') }}
                                        </a>
                                      </li>
                                      <li>
                                        <a wire:navigate href="{{ route('pro.cart') }}">
                                            {{ __('Кошик запакувати') }}
                                        </a>
                                      </li>
                                      <li>
                                          <a wire:navigate href="{{ route('admin.orders') }}">
                                              {{ __('Orders') }}
                                          </a>
                                      </li>

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
                          </div> <!-- dropdown-mega-menu.// -->
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#"> Бренди</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Про нас</a>
                      </li>
                  </ul>

              </div><!-- ./offcanvas-body -->

          </div><!-- ./offcanvas -->

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
                    {{-- Cart 99+ offcanvas_OFF data-bs-toggle="offcanvas" прибираємо. Будемо показувати засобами JS --}}
                    <button type="button" class="cart-header__icon btn btn-light rounded-pill position-relative"
                      id="cart-open" data-bs-target="#offcanvasCart"
                      aria-controls="offcanvasCart">
                      <i class="bi bi-handbag"></i>
                      <span class="position-absolute translate-middle badge rounded-pill bg-warning">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                      {{-- додається через JS, коли Device додаємо в Пакет
                      <span class="badge text-bg-warning cart-badge bg-warning rounded-circle">55</span> --}}
                    </button>
                    {{-- ./Cart 99+ --}}
                  </li>


                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                      <ul class="dropdown-menu dropdown-menu-end animate slideIn">
                        <li class="dropdown-header">
                          <h6>{{ auth()->user()->name }}</h6>
                          <span>Посада</span>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a wire:navigate href="#" class="dropdown-item">
                                {{ __('Особистий кабінет') }}
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('logout') }}" class="dropdown-item">
                                {{ __('Вихід') }}
                            </a>
                        </li>
                      </ul>
                  </li>
              </ul>

            <form action="" class="search-bar">
                <input type="search" class="search-input" placeholder="Шукати..." tabindex="0">
                <button class="search-submit" tabindex="0" type="submit">
                <i class="bi bi-search"></i>
                </button>
            </form>

          </div><!-- ./navbar-side -->

      </div>
  </nav>

  @include('includes.offcanvas-cart')

</header>
