<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use App\Models\Device;

class ProDeviceEdit extends Component
{
    public $titlePage = 'Редагувати. Довідник пристроїв. Pro';

    public function render()
    {
        return view('livewire.comp.devices.pro-device-edit')
        ->layoutData([
              'titlePage'=>$this->titlePage])
        ->layout('components.layouts.main');
    }
}
