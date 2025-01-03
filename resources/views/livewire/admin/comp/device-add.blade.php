<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')


    <div class="card offset-3 col-6">

    <div class="card-header">
        <h1 class="h5">{{$this->titlePage}}</h1>
    </div>

    <div class="card-body">
        <x-forms.form wire:submit.prevent="saveRow">

        <div class="mb-2">
          <x-select name="dev_type_id" label="Тип" :items=$dev_types wire:model="dev_type_id" value={{$dev_type_id}}/>
        </div>

        <div class="mb-2">
          <x-select name="brand_id" label="Бренд" :items=$brands value="{{ $brand_id }}" wire:model="brand_id"/>
        </div>

        <x-input name="name" length="255" label="Назва (від 2 до 255)" type="text" wire:model="name" value="{{ old('name') }}" placeholder="від 2 до 255" />

        <x-input name="note" length="255" label="Примітка (до 255)" type="text" wire:model="note" value="{{ old('note') }}" placeholder="У разі потреби додаткових характеристик до 255 символів"/>


        <input type="file" wire:model="photo">
        @error('photo') <span class="error">{{ $message }}</span> @enderror

        <x-button label="{{ __('Додати') }}"/>
        {{-- <x-button label="{{ __('Add to Cart') }}" wire:click="addToCart({{ $device_id }})"/> --}}
        </x-forms.form>
    </div>

    </div>

</div>


