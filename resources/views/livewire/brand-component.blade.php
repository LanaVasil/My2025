<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

  <div class="row">
    {{-- Left - Sidebar Filters --}}
    <div class="col-lg-2 col-md-3">
    </div>

    {{-- Right - Tables --}}
    <div class="col-lg-10 col-md-9">
    <x-forms.form wire:submit.prevent="saveBrand">

        <x-input name="name" label="Назва" type="text" placeholder="Бренд (від 3 до 255)" wire:model="name" value="" />

        <x-button label="{{ __('Додати бренд') }}"/>
    </x-forms.form>

    <ul>
        @foreach ($rows as $row)
        <li>{{ $row->name }}</li>
        @endforeach
    </ul>
    </div>

</div>
</div>
