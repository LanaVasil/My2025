<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

  <div class="row">
    {{-- Left - Sidebar Filters --}}
    <div class="col-lg-2 col-md-3">

      {{-- <div class="sidebar mb-2"> --}}
        <div class="card mb-1">
          <h5 class="card-header"><i class="bi bi-filter"></i>Фільтри</h5>
        </div>

        <div class="card mb-1">
          <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Пошук за назвою...">
        </div>

        {{-- wire:change="selectedBs()" wire:model="filterBrands.{{ $item->id }}" --}}
        {{-- DevType filters --}}
        <div class="card mb-1">
          <h6 class="card-header">Тип</h6>

          <div class="card-body">
            <ul class="list list-inline mb-0">
              @foreach ($dev_types as $item)
                <li class="list-item">
                  <div class="form-check">
                    <input class="form-check-input" wire:change="chkDevTypes()"  wire:model.live="listDevTypes.{{ $item->id }}" value="{{$item->id}}" id="dev_type_{{$item->id}}" type="checkbox"/>
                    <label class="form-check-label @if(!$item->status) opacity-50 @endif" for="dev_type_{{$item->id}}">{{$item->name}}</label>
                  </div>
                </li>
              @endforeach

              {{-- filterDevTypes: {{ var_export($filterDevTypes) }} --}}

            </ul>
          </div>

        </div>

        {{-- Brand filters --}}
        <div class="card mb-1">
          <h6 class="card-header">Бренди</h6>

          <div class="card-body">
            <ul class="list list-inline mb-0">
              @foreach ($brands as $item)
                <li class="list-item">
                  <div class="form-check">
                    <input class="form-check-input" wire:change="chkBrands()" wire:model="listBrands.{{ $item->id }}" value="{{$item->id}}" id="brand_{{$item->id}}" type="checkbox"/>
                    <label class="form-check-label @if(!$item->status) opacity-50 @endif " for="brand_{{$item->id}}">{{$item->name}}</label>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        {{-- Status filters --}}
        <div class="card mb-1">
          <h6 class="card-header">Статус</h6>

          <div class="card-body">
            <ul class="list list-inline mb-0">
              @foreach ($statusDevice as $key=>$value)
                <li class="list-item">
                  <div class="form-check">
                    <input class="form-check-input" wire:change="chkStatus()" wire:model="listStatus.{{$key}}" value="{{$key}}" id="status_{{$key}}" type="checkbox"/>
                    <label class="form-check-label" for="status_{{$key}}">{{$value}}</label>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

    </div>
    {{-- ./Left - Sidebar Filters --}}


    {{-- Right - Tables --}}
    <div class="col-lg-10 col-md-9">
      {{-- <div class="container-fluid"> --}}

        <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
        {{-- <div class="row">
          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
        </div> --}}
      <div class="row g-3 align-items-center mb-2">

          {{-- Btn delete group + spinner-grow  --}}
          <x-button-del-group :rows=$chkIdRows/>

          {{-- number of entries per page / кількість записів на сторінці --}}
          <x-select-list :row=$paginationList wire:model.live="pagination" />

          {{-- Sort order of the table / порядок сортування таблиці --}}
          {{-- <x-select-list :row=$listStatus wire:model.live="sortStatus" /> --}}


        {{-- Clear --}}
        <div class="col-1">
          <a href="#" wire:navigate class="btn btn-outline-secondary rounded-pill float-end" >
            <i class="bi bi-stars"></i>
          </a>
        </div>

        {{-- Add --}}
        <div class="col-1">
          <a href="{{ route('devices.add') }}" wire:navigate class="btn btn-outline-secondary rounded-pill float-end" >
          {{-- <a href="/devices/add " wire:navigate class="btn btn-outline-secondary rounded-pill float-end" > --}}
            <i class="bi bi-plus-lg"></i>
          </a>
        </div>

      </div>

            <table class="table table-sm table-hover">

              <thead class="table-light">

                {{-- Displaying the name of the table columns --}}
                <tr>
                  <th scope="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox"
                      {{-- id="chkSelectAll" --}}
                        {{-- wire:key="true"
                        wire:model.live="chkAll" --}}
                        />
                        <label class="form-check-label">
                          #
                        </label>
                    </div>
                  </th>
                  <th scope="col">Тип</th>
                  <th scope="col">Бренд</th>
                  <th scope="col" wire:click="setSort('name')">
                    @if ( $sortByColumn != 'name')
                      <button class="btn">Назва <i class="bi bi-chevron-expand"></i></button>
                    @elseif ( $sortDirection == 'ASC')
                      <button class="btn">Назва <i class="bi bi-chevron-up"></i></button>
                    @else
                      <button class="btn">Назва <i class="bi bi-chevron-down"></i></button>
                    @endif
                  </th>
                  <th scope="col">Примітка</th>
                  <th scope="col" wire:click="setSort('status')">
                    @if ( $sortByColumn != 'status')
                      <button class="btn">Статус <i class="bi bi-chevron-expand"></i></button>
                    @elseif ( $sortDirection == 'ASC')
                      <button class="btn">Статус <i class="bi bi-chevron-up"></i></button>
                    @else
                      <button class="btn">Статус <i class="bi bi-chevron-down"></i></button>
                    @endif
                  </th>
                  <th scope="col">Дії</th>
                </tr>
                {{-- ./Displaying the name of the table columns --}}
              </thead>

              <tbody>
                @php $i = ($rows->currentPage()-1) * $rows->perPage();@endphp
                @forelse($rows as $item)
                {{-- <tr class="table-danger"> --}}
                <tr class="@if(!$item->status) opacity-50 @endif @if($item->status==9) table-danger @endif">

                  <td>
                    <div class="form-check">
                      <input class="form-check-input" value="{{$item->id}}" type="checkbox"
                        wire:key="{{$item->id}}"
                        wire:model.live="chkIdRows"/>
                        <label class="form-check-label" for="row_{{$item->id}}">
                          {{$rows->firstItem()+$loop->iteration-1}}
                        </label>
                    </div>
                  </td>
                  <td>{{$item->dev_type->name}}</td>
                  <td>{{$item->brand->name}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->note}}</td>
                  <td>{{$this->statusDevice[$item->status]}}</td>
                  <td>
                      <a href="/devices/edit/{{$item->id}}" wire:navigate class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-pencil"></i>
                      </a>

                      {{-- Btn delete one + spinner-grow  --}}
                      <x-button-del-one id="{{ $item->id }}" name="{{ $item->name }}"/>

                    </td>


                </tr>
                @empty
                <tr>
                  <td colspan="5">Записів не знайдено</td>
                </tr>
                @endforelse
              </tbody>
            </table>

            <span>{{$rows->links()}}</span>

          {{-- </div> --}}

      </div>

      </div>
    {{-- ./Right - Tables --}}

  </div>

</div>

