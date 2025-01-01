{{-- <x-input-with-tag type="text" name="note" placeholder="У разі потреби додаткових характеристик" bi="<i class='bi bi-box-arrow-in-right'></i>" 'autofocus' => false/> --}}

@props([
    'type'=> 'text',
    'name',
    'placeholder' => null,
    'bi' => 'bi bi-person',
    'autofocus'=>null,
  ])


<div class="col-12">
  <div class="input-group mb-2">
    <span class="input-group-text"><i class="{{ $bi }}"></i></span>
    <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" class="form-control @error($name) is-invalid @enderror" {{$attributes}}   {{ $autofocus ? 'autofocus' : '' }}>

    @error($name) <span class="text-danger">{{$message}}</span> @enderror
  </div>
</div>





