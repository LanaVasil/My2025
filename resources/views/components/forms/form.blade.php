<form class="row g-3" {{ $attributes }}>
    @csrf
    {{ $slot }}
</form>

