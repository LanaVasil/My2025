
<!-- offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart"
  aria-labelledby="offcanvasCartLabel">
  <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasCartLabel">
          Пакет
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
          aria-label="Закрыть"></button>
  </div>
  <div class="offcanvas-body">

      <div class="cart-header__body">
          <table class="table">
              <tbody class="cart-header__list cart-list">

              </tbody>
              <tfoot>
                  <tr>
                      <td class="text-end">Разом:</td>
                      <td class="cart-list__total text-end">325</td>
                      <td>&nbsp;</td>
                  </tr>
              </tfoot>
          </table>
      </div>

      <div class="text-end">
          <a href="#" class="btn btn-outline-secondary">
              {{ __('Запакувати') }}
          </a>
          {{-- session()->push('cart', $device); --}}
      </div>

  </div>
</div>
<!-- ./offcanvas -->