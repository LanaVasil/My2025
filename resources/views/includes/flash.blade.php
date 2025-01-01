{{-- не використовується бо є в app/Support/Helpers/common.php функція 'flash' --}}

{{-- session()->flash('flash.message', 'Запис додано.');
session()->flash('flash.type', 'success'); --}}

{{-- danger - повідомлення буде червоним --}}
{{-- ->with(flash( 'Йой, то шо таке не таке. Невірний логін або пароль.', 'danger') ); --}}
@if(session('flash.message'))
    <div class="alert alert-{{ session('flash.type', 'success') }} alert-dismissible fade show" role="alert">
        <p class="mb-0">{{ session('flash.message') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
