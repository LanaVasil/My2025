<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

<div class="row">
      {{-- Left - Sidebar Filters --}}
      <div class="col-lg-2 col-md-3">

          <div class="card mb-1">
          <h5 class="card-header"><i class="bi bi-filter"></i>Фільтри</h5>
          </div>
      </div>
      {{-- ./Left - Sidebar Filters --}}

      {{-- Right - Tables --}}
      <div class="col-lg-10 col-md-9">
    <div class="row">
        @if (empty($cart))
            <p>Пакет порожній</p>
        @else

        <table>
            <thead>
                <tr>
                    <th>bfghf</th>
                    <th>fdgfdg</th>
                    <th>3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $deviceId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['brand'] }}</td>
                        <td>
                            <input type="number" wire:model.lazy="cart.{{ $deviceId }}.quantity"
                            min="1" wire.change="updateQuantity({{ $deviceId }}, cart.{{ $deviceId }}.quantity)">
                        </td>
                        <td>${{ $item['quantity'] }}</td>
                        <td><button wire:click="removeFromCart({{ $deviceId }})">Видалити</button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <h3>Разом: {{ $total }}</h3>

        <button wire:click="confirmOrder">Confirm Order</button>
        @endif

    </div>

      </div>
    </div>
</div>
