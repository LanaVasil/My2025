{{-- <x-check-input name="remember" label=" __('Запам`ятати мене')"/> --}}

@props([
  'name',
  'label' => null,
])

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="{{$name}}" value="true" id="rememberMe">
    <label class="form-check-label" for="rememberMe">{{$label}}</label>
</div>
