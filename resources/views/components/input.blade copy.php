{{-- <x-input name="note" label="Примітка" type="text" placeholder="У разі потреби додаткових характеристик" wire:model="note" value="" /> --}}

@props([
  'name', 
  'label', 
  'type'=> 'text', 
  'placeholder' => null,
  'length' => null, 
  'id' => null
  ])
  
  @php
  //не зовсім круто, краше додати class компонента
  if ($id===null){
  $id = "fields-$name";
  //$id = $name . '-' . bin2hex(random_bytes(8))
  }


<div class="mb-2">
  <label for="{{$name}}" class="form-label">{{$label}}</label>
  <input type="{{$type}}" name="{{$name}}" id="{{$name}}" class="form-control" {{$attributes}} >

  @error($name) <span class="text-danger">{{$message}}</span> @enderror
    
  {{-- Залишилось символів   --}}
  @if ($length) 
    <small><em>
      {{ __('Залишилось:') }} <span x-text="{{($length*1)}} - $wire.{{$name}}.length"></span>
    </em></small>
  @endif

</div>



//  якщо об'єднати add + edit порада як писати пропси
// @props(['id' => null, 'name'])

// <input {{ $attributes->class(['form-control'])->merge(['id' => $id ?? $name, 'name' => $name, 'type' => 'text']) }}>