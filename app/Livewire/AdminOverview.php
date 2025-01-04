<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Device;
use App\Models\Brand;

class AdminOverview extends Component
{
    public $titlePage = 'AdminOverview';

    public $totalOrders;
    public $totalDevices;
    public $totalBrands;

    public $ordersByStatus;

    public function mount()   {
        $this->loadOverviewDate();
    }

    public function loadOverviewDate() {
        $this->totalOrders = Order::count();
        $this->totalDevices = Device::count();
        $this->totalBrands = Brand::count();
    }
    public function render()
    {
        return view('livewire.admin-overview')
        ->layoutData([
                'titlePage'=>$this->titlePage])
        ->layout('components.layouts.admin');
    }
}
