{{-- <x-input name="note" label="Примітка" type="text" placeholder="У разі потреби додаткових характеристик" wire:model="note" value="" /> --}}
{{-- <x-input name="sort" label="За порядком" type="number" min="1" max="100" wire:model="name" value="" /> --}}

@props([
  'name',
  'label',
  'type'=> 'text',
  'placeholder' => null,
  'id' => null,
  ])

<div class="mb-2">
  <label for="{{$name}}" class="form-label">{{$label}}</label>
  <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control @error($name) is-invalid @enderror" {{$attributes}} >

  @error($name) <span class="text-danger">{{$message}}</span> @enderror
</div>
