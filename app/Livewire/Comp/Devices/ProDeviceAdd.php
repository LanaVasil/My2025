<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Models\Brand;
use App\Models\DevType;
use App\Models\Device;

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
    public $note, $status;

    // #[Rule('required|string|unique:devices|min:2|max:255')]
    #[Validate('required')]
    public $name;

    // #[Rule('image|max:2048')]
    // #[Validate('image', message: 'Тільки зображення')]
    // #[Validate('mimes:jpg,png,webp', message: 'Тільки jpg,png,webp')]
    // #[Validate('max:2048')]
    // #[Validate('mimes:jpg,jpeg,png,webp|file|size:2048|nullable')]
    #[Validate('mimes:jpg,jpeg,png,webp|file|max:2048|nullable')]
    public $img;


    // #[Validate('required')]
    // #[Validate('required')]
    public $dev_type_id;

    // #[Rule('required')]
    // #[Rule('required')]
    public $brand_id;

    #[On('edit-mode')]
    public function edit($id){
        // dd($id);
        $this->editForm=true;
        $this->titleForm = 'Редагувати';
        // $this->item = Device::findOrFail($id);

        // $this->itemId = $this->item->id;
        // $this->name = $this->item->name;
        // $this->note = $this->item->note;


        // // $this->img = $this->item->img;
        // $this->dev_type_id = $this->item->dev_type_id;
        // $this->brand_id = $this->item->brand_id;

        $row = Device::findOrFail($id);

        $this->itemId = $row->id;
        $this->name = $row->name;
        $this->note = $row->note;

        // $p = $row->img;
        // @if($avatar){{$avatar ? $avatar->temporaryUrl() : asset('storage/'.auth()->user()->avatar)}}@endif
        // $this->img = $this->item->img;

        $this->dev_type_id = $row->dev_type_id;
        $this->brand_id = $row->brand_id;
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

      $this->validate();

      $imagePath = null;

      if ($this->img){
        $imageName = time().'.'.$this->img->extension();
        $imagePath = $this->img->storeAs('public/devices', $imageName);
      }

    $device = Device::create([
        'name'=> $this->name,
        'note'=> $this->note,
        // 'status'=> $this->status,
        'img'=> $imagePath,
        'dev_type_id'=> $this->dev_type_id,
        'brand_id'=> $this->brand_id,
    ]);

    // Флеш повідомлення
    if ($device) {
      // flash('Запис додано.');
      return redirect('/pro/devices')->with(flash('Запис додано.'));
    }else{
      // flash('Запис додати не вдалось.','danger');      
      return redirect('/pro/devices')->with(flash('Запис додати не вдалось.','danger'));
    }

    // $this->reset();
    // return redirect('/pro/devices');
  
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
