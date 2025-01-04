<div>

    <h1>klfhdjkfgh</h1>
@foreach ($rows as $row)
<div>
    <img src="{{ asset('storage/devices/') .$row->photo) }}" alt="{{ $row->name}}">

    <p>{{ $row->name }}</p>
    <p>{{ $row->note }}</p>
    <p>{{ $row->brand_id }}</p>


    <button wire:click="addToCart({{ $row->id }})'>У пакет</button>
    <a href="{{ route('device.show', $row->id) }}">Огляд</a>
</div>

@endforeach

</div>
