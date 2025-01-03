{{-- <x-button class="w-100" label="{{ __('Розпочати') }}"/> --}}

@props([
  'class'=> null,
  'label' => null,
])

<button class="btn btn-outline-warning {{$class}}" type="submit" {{$attributes}}>{{$label}}</button>

