<?php

namespace App\Livewire\Pro\Comp;

use App\Models\Device;
use Livewire\Component;

class DevicesList extends Component
{
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
            'brand_id'=> $device->brand_id,
            'quantity'=> 1,
        ];
       }

        session()->put('cart',$cart);
        // Флеш повідомлення
        flash("{$device->name} покладено у пакет");
    }

    public function render()
    {
        return view('livewire.pro.comp.devices-list',[
            'device'=> Device::all()
        ]);
    }
}
