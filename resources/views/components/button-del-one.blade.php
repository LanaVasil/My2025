{{-- <x-button-del-group id={{ $id }} name={{ $name }}/>  --}}

@props(['id', 'name']) 

<button class="btn btn-outline-danger rounded-pill" 
  wire:click="deleteRow({{ $id }})" wire:confirm="Ви впевнені, що хочете видалити\nназву: {{ $name }}?">
    <i class="bi bi-trash3"></i> 
</button>

<div class="spinner-grow" role="status" wire:loading wire:target="deleteRow({{ $id }})">
</div>


{{-- Btn delete one + spinner-grow  --}}
{{-- <button class="btn btn-outline-danger rounded-pill" wire:click="deleteRow({{$item->id}})" wire:confirm="Ви впевнені, що хочете видалити цей запис?">
  <i class="bi bi-trash3"></i>
</button>
<div class="spinner-grow" role="status" wire:loading wire:target="deleteRow({{ $item->id }})">
    <span class="visually-hidden">Loading...</span>
</div> --}}

