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
              <!-- Кнопка-триггер модальне вікно staticArticle -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticArticle">
                Додати
              </button>
              <!-- Модальне вікно staticArticle-->
              {{-- <livewire:comp.devices.pro-device-add/> --}}
              <livewire:comp.devices.pro-device-add/>
          </div>




        <div class="row">
          @foreach ($rows as $row)
            <article data-pid="{{ $row->id }}" class="shadow article p-2 me-2 mb-2 align-self-stretch"
              style="width: 18rem;">
                <div class="img-with-btns">
                    <img src="{{ asset('storage/' .$row->img) 
                      ? asset('storage/img/empty.jpg') : asset('storage/' .$row->img) }}" 
                      alt="Photo {{ $row->id}}">

                    <div class="img-with-btns__btn-plus">
                        <i class="bi bi-grip-horizontal"></i>
                    </div>

                    <button href="#" class="img-with-btns__btn-group" title="Видалити">
                        <i class="bi bi-trash3"></i>
                    </button>

                    {{-- <button href="#" class="img-with-btns__btn-group rounded-pill" title="Редагувати">
                        <i class="bi bi-pencil"></i>
                    </button> --}}
                    {{-- Редагувати --}}
                    <button @click="$dispatch('edit-mode',{id:{{$row->id}}})" 
                      type="button" 
                      class="img-with-btns__btn-group rounded-pill" 
                      data-bs-toggle="modal" data-bs-target="#staticArticle">
                      <i class="bi bi-pencil"></i>
                    </button>

                    <button wire:click="addToCart({{ $row->id }})"
                        class="img-with-btns__btn-group rounded-pill" title="Додати до пакування">
                        <i class="bi bi-handbag"></i>
                    </button>
                </div>

              <a href="{{ route('pro.device.show', $row->id) }}" class="article__link" title="Огляд">
                  <div class="text-center opacity-75">{{ $row->dev_type->name }}</div>
                  <div class="text-center opacity-75">{{ $row->brand->name }}</div>
                  <h5 class="text-center text-oneline">{{ $row->name }}</h5>
                  <small class="text-center text-oneline">{{ $row->note }}</small>
              </a>


            </article>
          @endforeach
        </div>

      </div>
    </div>

</div>



