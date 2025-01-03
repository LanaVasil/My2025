<?php

namespace App\Livewire\Admin\Comp;

use Livewire\Component;
use App\Models\Brand;
use App\Models\DevType;
use App\Models\Device;
use Livewire\WithFileUploads;
use Barryvdh\Debugbar\Facades\Debugbar;

class DeviceAdd extends Component
{
    use WithFileUploads;

    public $titlePage = 'Довідник пристроїв. Додати.';

    public $name, $note, $status, $photo, $dev_type_id , $brand_id;

    // public function mount()
    // {
    //     $this->brands = Brand::all();
    // }

    public function saveRow(){

        $this->validate([
            'name'=> 'required|string|unique:devices|min:3|max:255',
            'photo' => 'image|max:2048', // 1MB Max
        ]);

        $path =$this->photo->store(path: 'devices');

        // $path = $this->photo->storePublicly(path: 'photos');// $path = $this->img->store('devices','public');

        Device::create([
            'name'=> $this->name,
            'note'=> $this->note,
            // 'status'=> $this->status,
            'photo'=> $path,
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
        ->layout('components.layouts.app');

    }
}
