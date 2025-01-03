{{-- <x-select name="brand_id" label="Бренд" :items=$brands wire:model="brand_id" /> --}}

@props(['name','label','items', 'value']) 
<div class="mb-2">
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>

  <select name="{{ $name }}" id="{{ $name }}" class="form-select" {{$attributes}}>
    <option value="{{$value}}">-- Оберіть з переліку --</option>
    @foreach ( $items as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>   
    @endforeach
  </select>
  
  @error($name) 
    <span class="text-danger">{{$message}}</span>
  @enderror
</div>
