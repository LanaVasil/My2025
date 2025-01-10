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
            <article data-pid="{{ $row->id }}" class="card p-2 me-2 mb-2 align-self-stretch"
              style="width: 18rem;">

                <img src="{{ asset('storage/' .$row->img) ? asset('storage/img/empty.jpg') : asset('storage/' .$row->img) }}" alt="Photo {{ $row->id}}">
            
                <button wire:click="addToCart({{ $row->id }})" class="position-absolute top-50 start-50 btn btn-light rounded-pill" title='Додати до пакування'><i class="bi bi-handbag"></i></button>

              {{-- <div class="card-body"> --}}
              <a href="{{ route('pro.device.show', $row->id) }}" class="card-body">  
                  <div class="opacity-75">{{ $row->dev_type->name }}</div>
                  <div  class="opacity-75">{{ $row->brand->name }}</div>
                  <h5 class="card-oneline">{{ $row->name }}</h5>
                  <small class="card-oneline">{{ $row->note }}</small>
              </a>

            {{-- </div> --}}
            </article>
          @endforeach
        </div>
        
      </div>
    </div>

