<div>
<div class="main__container">
    {{-- Breadcrumbs / хлібні крихти, назва сторинки  --}}
    @include('includes.breadcrumbs')

    <!-- Флеш повідомлення (показати і після цього видалили з сесії). Відображення повідомлення про вдалу Add / Edit / Delete -->
    @include('includes.flash')

    <div class="row">
        {{-- Left - Sidebar Filters --}}
        <div class="col-lg-2 col-md-3">

        </div>
        {{-- ./Left - Sidebar Filters --}}

        {{-- Right - Tables --}}
        <div class="col-lg-10 col-md-9 d-flex">
            <div class="col-lg-4">
                <div class="dashstat">
                    <i class="bi bi-bag"></i>
                    <div class="dashstat_content">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Total Order</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashstat">
                    <i class="bi bi-aspect-ratio"></i>
                    <div class="dashstat_content">
                        <h3>{{ $totalDevices }}</h3>
                        <p>Total Пристроїв</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="dashstat">
                    <i class="bi bi-aspect-ratio"></i>
                    <div class="dashstat_content">
                        <h3>{{ $totalBrands }}</h3>
                        <p>Total Бренди</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- ./Right - Tables --}}
    </div>
</div>
