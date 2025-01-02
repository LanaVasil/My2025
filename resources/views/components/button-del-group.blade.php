{{-- <x-button-del-group :rows=$chkIdRows/> --}}

@props(['rows']) 

{{-- <div class="row">  --}}
  @if(count($rows)>0)
    <div class="col-auto">
      <button class="btn btn-outline-danger rounded-pill" 
            wire:click="deleteRow()" 
            wire:confirm="Ви впевнені, що хочете видалити позначені записи?">

        <i class="bi bi-trash3"></i> {{count($rows)}}
        
      </button>
    </div>

    <div class="spinner-grow" role="status" wire:loading wire:target="deleteRow()">
      {{-- <span class="visually-hidden">Loading...</span> --}}
    </div>
  @endif

{{-- </div> --}}
