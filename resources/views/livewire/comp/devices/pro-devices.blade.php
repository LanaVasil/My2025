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
              <img src="{{ asset('storage/' .$row->img) ? asset('storage/img/empty.jpg') : asset('storage/' .$row->img) }}" alt="Photo {{ $row->name}}">
              <p>{{ $row->dev_type->name }}</p>
              <p>{{ $row->brand->name }}</p>
              <p>{{ $row->name }}</p>
              <p>{{ $row->note }}</p>
              <button wire:click="addToCart({{ $row->id }})">У пакет</button>
              <a href="{{ route('pro.device.show', $row->id) }}">Огляд</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

