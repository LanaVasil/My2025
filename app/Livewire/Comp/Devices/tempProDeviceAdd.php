<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use Livewire\Attribute\Rule;
use App\Models\Brand;
use App\Models\DevType;
use App\Models\Device;
use Livewire\WithFileUploads;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Auth\Events\Validated;

class tempProDeviceAdd extends Component
{
    use WithFileUploads;

    public $titlePage = 'Додати.';

    public $note, $status, $img, $dev_type_id , $brand_id;

    #[Rule('required')]
    public $name;


    public function save(){
      $this->validate();  
      dd(1);
    }
    public function saveRow(){

        $this->validate([
            'name'=> 'required|string|unique:devices|min:2|max:255',
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
        view('livewire.comp.devices.pro-device-add',[
            // 'rows'=>$this->getDevices(),
            'dev_types'=>$this->getDevTypes(),
            'brands'=>$this->getBrands()
            ])
        ->layoutData([
            'titlePage'=>$this->titlePage])
        ->layout('components.layouts.main');
    }
}



// <div class="mb-2">
//   <label for="name" class="form-label">Назва</label>
//   <input type="text" name="name" placeholder="fdgfdgfdg" class="form-control @error('name') is-invalid @enderror" >

//   @error('name') <span class="text-danger">{{$message}}</span> @enderror
// </div>                     
