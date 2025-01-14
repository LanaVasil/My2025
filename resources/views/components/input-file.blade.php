{{-- <x-input name="note" label="Примітка" type="text" placeholder="У разі потреби додаткових характеристик" wire:model="note" value="" /> --}}

@props([
  'name', 
  ])

<div class="mb-2">
  {{-- <input type="file" class="form-control" wire:model="{{$name}}" aria-label="file example"> --}}
  <input type="file" class="form-control" wire:model="{{$name}}">

  @error($name) <span class="text-danger">{{$message}}</span> @enderror
</div>
