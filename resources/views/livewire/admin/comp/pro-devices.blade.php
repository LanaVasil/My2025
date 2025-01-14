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
        {{-- Clear --}}
        <div class="col-1">
          <a href="#" wire:navigate class="btn btn-outline-secondary rounded-pill float-end" >
            <i class="bi bi-stars"></i>
          </a>
        </div>

        {{-- Add --}}
        <div class="col-1">
          <a href="{{ route('pro.device.add') }}" wire:navigate class="btn btn-outline-secondary rounded-pill float-end" >
          {{-- <a href="/devices/add " wire:navigate class="btn btn-outline-secondary rounded-pill float-end" > --}}
            <i class="bi bi-plus-lg"></i>
          </a>

          </a>
        </div>
    {{-- Right - Tables --}}
    <div class="col-lg-10 col-md-9">



      {{-- </div> --}}

        <div class="row">
          @foreach ($rows as $row)
            <article data-pid="{{ $row->id }}" class="card article item-device p-2 me-2 mb-2 align-self-stretch"
              style="width: 18rem;">
                <div class="img-with-btns">
                    <img class="item-device__image" src="{{ asset('storage/' .$row->img) ? asset('storage/img/empty.jpg') : asset('storage/' .$row->img) }}" alt="Photo {{ $row->id}}">

                    <div class="img-with-btns__btn-plus">
                        <i class="bi bi-grip-horizontal"></i>
                    </div>


                    {{-- === button Delete === --}}
                    <button class="img-with-btns__btn-group" title="Видалити"
                    wire:click="deleteRow({{ $row->id }})" wire:confirm="Ви впевнені, що хочете видалити запись:\n{{ $row->name }}?">
                        <i class="bi bi-trash3"></i>
                    </button>

                    {{-- <form action=""{{ route('pro.device.edit', $row->id) }}"" method="post"> --}}
                    <button class="img-with-btns__btn-group rounded-pill" title="Редагувати">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <button wire:click="addToCart({{ $row->id }})"
                        class="img-with-btns__btn-group item-device__button rounded-pill" title="Додати до пакування">
                        <i class="bi bi-handbag"></i>
                    </button>
                </div>
              {{-- <div class="card-body"> --}}
              <a href="{{ route('pro.device.show', $row->id) }}" class="article__link" title="Огляд">
                  <div class="text-center opacity-75">{{ $row->dev_type->name }}</div>
                  <div class="text-center opacity-75">{{ $row->brand->name }}</div>
                  <h5 class="text-center text-oneline">{{ $row->name }}</h5>
                  <small class="text-center text-oneline">{{ $row->note }}</small>
              </a>

            {{-- </div> --}}
            </article>
          @endforeach
        </div>

      </div>

