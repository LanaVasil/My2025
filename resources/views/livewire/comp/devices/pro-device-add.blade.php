<!-- Модальне вікно -->
{{-- wire:ignore.self - перед class="modal fade" додаємо. Щоб не залишалось чорне напів прозоре вікно --}}
<div wire:ignore.self class="modal fade" id="staticArticle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticArticleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticArticleLabel">{{ $titleForm }}|| {{ $itemId }}</h1>
                <button wire:click="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
                <div class="modal-body">

                  <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
                  @include('includes.flash')

                  {{-- <x-forms.form wire:submit.prevent="save"> --}}
                  <x-forms.form >

                    <div class="mb-2">
                    <x-select name="dev_type_id" label="Тип" :items=$dev_types wire:model="dev_type_id" value={{$dev_type_id}}/>
                    </div>
        
                    <div class="mb-2">
                    <x-select name="brand_id" label="Бренд" :items=$brands value="{{ $brand_id }}" wire:model="brand_id"/>
                    </div>
        
                    <x-input name="name" label="Назва (від 2 до 255)" type="text" wire:model="name" value="{{ old('name') }}" placeholder="від 2 до 255" />

                    <x-input name="note" label="Примітка (до 255)" type="text" wire:model="note" value="{{ old('note') }}" placeholder="У разі потреби додаткових характеристик до 255 символів"/>
        
                    <x-input-file name="img"/>
  
                    </x-forms.form>



                </div>
            <div class="modal-footer d-flex justify-content-between">
                    <x-button label="{{ __('Повернутись') }}" class="btn-light" wire:click="close" data-bs-dismiss="modal"/> 
                @if ($editForm)
                    <x-button label="{{ __('Зберегти зміни') }}" wire:click="update"/>                    
                @else
                    <x-button label="{{ __('Зберегти') }}" wire:click="save"/>
                @endif
            </div>
        </div>
    </div>
</div>

 




