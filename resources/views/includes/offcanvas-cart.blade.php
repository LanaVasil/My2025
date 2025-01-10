      <!-- offcanvas -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasCartLabel">
            До пакування
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
        </div>
        <div class="offcanvas-body">
          <div class="table-responsive">
            <table class="table offcanvasCart-table">
              <tbody>
                <tr>
                  <td><a href="#">Product 1 Lorem ipsum dolor, sit amet consectetur adipisicing.</a></td>
                  <td>$65</td>
                  <td>&times;1</td>
                  <td><button class="btn btn-light rounded-circle"><i class="bi bi-trash3"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">Product 2</a></td>
                  <td>$80</td>
                  <td>&times;2</td>
                  <td><button class="btn btn-light rounded-circle"><i class="bi bi-trash3"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">Product 3</a></td>
                  <td>$100</td>
                  <td>&times;1</td>
                  <td><button class="btn btn-light rounded-circle"><i class="bi bi-trash3"></i></button>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-end">Разом:</td>
                  <td>$325</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              Кнопка раскрывающегося списка
            </button>
            <ul class="dropdown-menu">
              <li>
                {{-- [Андрей Кудлай E-Shop урок 8] 25:58 про href="#footer"--}}
                {{-- додали клас closecart - для тих посилань які закривають вікно Сart --}}
                <a class="dropdown-item closecart" href="#footer" data-href="footer">Footer</a>
              </li>
              <li>
                <a class="dropdown-item closecart" href="#about" data-href="about">About</a>
              </li>
              <li>
                <a class="dropdown-item closecart" href="#map" data-href="map">Map</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- ./offcanvas -->