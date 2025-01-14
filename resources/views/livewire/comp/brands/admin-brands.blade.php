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
    <x-forms.form wire:submit.prevent="saveBrand">

        <x-input name="name" label="Назва" placeholder="Бренд (від 3 до 255)" wire:model="name" value="" />
    {{-- <small><em> --}}
      {{-- {{ __('Залишилось:') }} <span x-text="{{ 255 -  wire.name.length }}"></span> --}}
    {{-- </em></small> --}}

        <x-input name="sort" label="За порядком" type="number" min="1" max="100" wire:model="sort" value="" />

        <x-button label="{{ __('Додати бренд') }}"/>
    </x-forms.form>

    <ul>
        @foreach ($rows as $row)
        <li>{{ $row->name }} | {{ $row->sort }}</li>
        @endforeach
    </ul>
    </div>

</div>
