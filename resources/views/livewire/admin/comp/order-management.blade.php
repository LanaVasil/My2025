
<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

<h1>Order Management</h1>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Device</th>
            <th>User</th>
            <th>Status</th>
            <th>Actoins</th>
        </tr>
    </thead>
    <tbody>
@foreach ($orders as $order)
<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->device->name }}</td>
    <td>fdhgf</td>
    <td>{{ $order->user }}</td>
    <td>{{ $order->status }}</td>
    <td>
        <button wire:click="approverOrder({{ $order->id }})">Approve</button>
        <button wire:click="cancelOrder({{ $order->id }})">Cancel</button>
    </td>

</tr>

@endforeach

    </tbody>
</table>

</div>
