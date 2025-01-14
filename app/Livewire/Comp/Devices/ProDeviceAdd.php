<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Brand;
use App\Models\DevType;
use App\Models\Device;
use Livewire\WithFileUploads;

use Barryvdh\Debugbar\Facades\Debugbar;

class ProDeviceAdd extends Component
{
    use WithFileUploads;

    public $titleForm = 'Додати';

    public $editForm=false;

    public $item;
    public $itemId;

    // public $name, $note, $status, $img, $dev_type_id , $brand_id;

  //   return [
  //     'name'  => ['required', 'string', 'max:255'],
  //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
  // ];

    // public $name, $note, $status, $img, $dev_type_id , $brand_id;
    #[Rule('required|string|unique:devices|min:2|max:255')]
    public $name;

    #[Rule('image|max:2048')]
    public $img;


    #[Rule('required')]
    public $dev_type_id;

    #[Rule('required')]
    public $brand_id;

    public $note, $status;

    #[On('edit-mode')]
    public function edit($id){
        // dd($id);
        $this->editForm=true;
        $this->titleForm = 'Редагувати';
        $this->item = Device::findOrFail($id);

        $this->itemId = $this->item->id;
        $this->name = $this->item->name;
        $this->note = $this->item->note;


        // $this->img = $this->item->img;
        $this->dev_type_id = $this->item->dev_type_id;
        $this->brand_id = $this->item->brand_id;
    }

    public function update(){
      // dd(123);
      $validated=$this->validate();
      $id = Device::findOrFail($this->itemId);
      $id->update($validated);
      // $this->dispatch('refresh-list');

      // Флеш повідомлення
      flash('Зміни збережено.');
      // $this->reset();
    }

    public function save(){
      $validated = $this->validate();

      // dd(1);

    //   $img =$this->img->store(path: 'devices');

      // $this->validate([
      //   'name'=> 'required|string|unique:devices|min:2|max:255',
      //   'img' => 'image|max:2048', // 2MB Max
      // ]);


    //   $path =$this->img->store(path: 'devices');

    // Device::create([
    //     'name'=> $this->name,
    //     'note'=> $this->note,
    //     // 'status'=> $this->status,
    //     'img'=> $path,
    //     'dev_type_id'=> $this->dev_type_id,
    //     'brand_id'=> $this->brand_id,
    // ]);

        Device::create($validated);
        // Флеш повідомлення
        flash('Запис додано.');



        $this->reset();

        return redirect()->to('/pro/devices')
             ->with('Запис додано.');
    }

    public function close(){
      $this->reset();
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
        ]);
        // ->layoutData([
        //     'titlePage'=>$this->titlePage])
        // ->layout('components.layouts.main');
    }
}
