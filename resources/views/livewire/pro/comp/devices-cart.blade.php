<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

    <h1>Device Cart</h1>

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
                        <td>{{ $item['brand_id'] }}</td>
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

        <button wire:click="confirmOrder">Confirm Order</button>
    </div>
</div>
