<?php

namespace App\Livewire\Admin\Comp;

use Livewire\Component;
use App\Models\Brand;
use App\Models\DevType;
use App\Models\Device;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Barryvdh\Debugbar\Facades\Debugbar;

class DeviceAdd extends Component
{
    use WithFileUploads;

    public $titlePage = 'Довідник пристроїв. Додати.';

    public $name, $note, $status, $img, $dev_type_id , $brand_id;

    public function saveRow(){

        $this->validate([
            'name'=> 'required|string|unique:devices|min:3|max:255',
            'img' => 'image|max:2048', // 2MB Max
        ]);


        $path =$this->img->store(path: 'devices');

        Device::create([
            'name'=> $this->name,
            'note'=> $this->note,
            // 'status'=> $this->status,
            'img'=> $path,
            'dev_type_id'=> $this->dev_type_id,
            'brand_id'=> $this->brand_id,
    ]);

        // Флеш повідомлення
        flash('Запис додано.');
    }

    function getDevTypes(){
      return DevType::orderBy('sort', 'asc')->orderBy('name','asc')->get();
    }
    function getBrands(){
      return Brand::orderBy('sort', 'asc')->orderBy('name','asc')->get();
    }

    public function render()
    {
//   Debugbar::info( [$this->getDevices()]);
        return
        view('livewire.admin.comp.device-add',[
            // 'rows'=>$this->getDevices(),
            'dev_types'=>$this->getDevTypes(),
            'brands'=>$this->getBrands()
            ])
        ->layoutData([
            'titlePage'=>$this->titlePage])
        ->layout('components.layouts.main');

    }
}
