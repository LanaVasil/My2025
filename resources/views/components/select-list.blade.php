{{-- <x-select :items=$sortList wire:model.live="sortId" /> --}}

@props(['row']) 

<div class="col-auto">
  <select class="form-select" {{$attributes}}>

    @foreach ($row as $key => $value)
      <option value="{{ $key }}">{{ $value }}</option>
    @endforeach

  </select>
</div>
