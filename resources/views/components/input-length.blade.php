{{-- <x-input name="note" length="255" label="Примітка" type="text" placeholder="У разі потреби додаткових характеристик" wire:model="note" value="" /> --}}

@props([
  'name', 
  'label', 
  'type'=> 'text', 
  'placeholder' => null,
  'length' => 0, 
  'id' => null,
  ])
  
<div class="mb-2">
  <label for="{{$name}}" class="form-label">{{$label}}</label>
  <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control @error($name) is-invalid @enderror" {{$attributes}} >

  @error($name) <span class="text-danger">{{$message}}</span> @enderror
    
  {{-- Залишилось символів   --}}
  @if ($length>0)
  {{-- <span class="small"></span> --}}
    <small><em>
      {{ __('Залишилось:') }} <span x-text="{{($length)}} - $wire.{{$name}}.length"></span>
    </em></small>
  @endif

</div>
