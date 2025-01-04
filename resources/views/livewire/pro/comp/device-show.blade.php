<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

    <div class="row">

        <div class="col-6">

                        <img src="{{ asset('storage/devices/' .$row->photo) }}" alt="Photo {{ $row->}}">

                        <h1>{{ $row->name }}</h1>
                        <p>{{ $row->note }}</p>
                        <p>{{ $row->brand_id }}</p>
        </div>
    </div>
</div>
