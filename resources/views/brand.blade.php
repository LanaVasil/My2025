<x-layouts.app>

                @foreach ($devices as $device)
                    <div class="col-2">
                        <img src="{{ asset('storage/devices/' .$device->photo) }}" alt="Photo {{ $device->name}}">

                        <p>{{ $device->name }}</p>
                        <p>{{ $device->note }}</p>
                        <p>{{ $device->brand_id }}</p>

                        {{-- <button wire:click="addToCart({{ $device->id }})">У пакет</button> --}}
                        <a href="{{ route('device.show', $device->id) }}">Огляд</a>
                    </div>

                @endforeach

</x-layouts.app>
