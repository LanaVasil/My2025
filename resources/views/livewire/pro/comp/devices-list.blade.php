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
                @foreach ($rows as $row)
                    <div class="col-2">
                        <img src="{{ asset('storage/devices/' .$row->photo) }}" alt="Photo {{ $row->name}}">

                        <p>{{ $row->name }}</p>
                        <p>{{ $row->note }}</p>
                        <p>{{ $row->brand_id }}</p>


                        <button wire:click="addToCart({{ $row->id }})">У пакет</button>
                        <a href="{{ route('device.show', $row->id) }}">Огляд</a>
                    </div>

                @endforeach
            </div>
        </div>
        {{-- ./Right - Tables --}}
    </div>

</div>
