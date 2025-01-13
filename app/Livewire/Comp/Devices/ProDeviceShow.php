<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use App\Models\Device;

class ProDeviceShow extends Component
{

    public $titlePage = 'Довідник пристроїв. Pro';

    public $device;

    public function mount($id){
        $this->device = Device::findOrFail($id);
    }

    public function addToCart($deviceId){

      $device = Device::find($deviceId);

      if(!$device){
          // Флеш повідомлення
          flash('Не знайдено.');
          return;
      }

      $cart = session()->get('cart',[]);

      if(isset($cart[$deviceId])){
          $cart[$deviceId]['quantity'] ++;
      }else{
          $cart[$deviceId] = [
              'name'=> $device->name,
              'dev_type'=> $device->dev_type->name,
              'brand'=> $device->brand->name,
              'quantity'=> 1,
          ];
      }

      session()->put('cart', $cart);

      // Флеш повідомлення
      flash( "{$device->dev_type->name} :: {$device->brand->name} :: {$device->name} додано до пакування.");
      // flash("{$device->name} покладено у пакет");
    }

    public function render()
    {
        return view('livewire.comp.devices.pro-device-show',[
          'row'=> $this->device
        ])
        ->layoutData([
          'titlePage'=>$this->titlePage])
    ->layout('components.layouts.main');
    }
}
