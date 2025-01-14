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

                {{-- можно визначити так (на button тоді нічого не писати): --}}
                {{-- <x-forms.form wire:submit.prevent="save"> або <x-forms.form wire:submit="save"> --}}
                {{-- а можно <x-forms.form>, тоді на  --}}
                {{-- @if ($editForm) <x-button label="{{ __('Зберегти зміни') }}" wire:click="update"/> @else <x-button label="{{ __('Зберегти') }}" wire:click="save"/> @endif --}}
                <x-forms.form>

                    <div class="mb-2">
                    <x-select name="dev_type_id" label="Тип" :items=$dev_types wire:model="dev_type_id" value={{$dev_type_id}}/>
                    </div>
        
                    <div class="mb-2">
                    <x-select name="brand_id" label="Бренд" :items=$brands value="{{ $brand_id }}" wire:model="brand_id"/>
                    </div>
        
                    <x-input name="name" label="Назва (від 2 до 255)" type="text" wire:model="name" value="{{ old('name') }}" placeholder="від 2 до 255" asterisk="true"/>

                    <x-textarea name="note" label="Примітка" placeholder="У разі потреби додаткових характеристик" asterisk="true" wire:model="note" value="" />

                    {{-- <x-input name="note" label="Примітка (до 255)" type="text" wire:model="note" value="{{ old('note') }}" placeholder="У разі потреби додаткових характеристик до 255 символів"/> --}}

                    {{-- <img src="@if($img){{$img ? $img->temporaryUrl() : asset('storage/'.auth()->user()->avatar)}}@endif" alt=""> --}}

                    <x-input-img name="img" label="Зображення" asterisk="true" wire:model="img" />
                    {{-- Попередній огляд зображення --}}
                    @if ($img)
                        <div class="my-2">
                            <img src="{{ $img->temporaryUrl() }}" class="img-fluid" with="100px">
                        </div>
                    @endif

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

 




