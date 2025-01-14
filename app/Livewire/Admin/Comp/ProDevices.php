<?php

namespace App\Livewire\Comp\Devices;

use Livewire\Component;
use App\Models\Device;
use Barryvdh\Debugbar\Facades\Debugbar;

class ProDevices extends Component
{
    public $titlePage = 'Довідник пристроїв. Pro';

    public $cart;


    public function deleteRow($id = 0){
        try {
          if ($id){
            $rows = Device::findOrFail($id);
            session()->flash('success', "Назву: $rows->name видалено");
            $rows->delete();
            return $this->redirect(route('pro.devices'),navigate:true);

          }else{
            $count = count($this->chkIdRows);
            if ($count){
              Device::query()
              ->whereIn('id', $this->chkIdRows)
              ->delete();
              session()->flash('success', "Видалено $count запис(-ів)");

              $this->$chkIdRows = [];
              $this->$chkAll = false;

              // for ($i=0; $i<$count;$i++){
              //   $rows = Device::findOrFail($this->chkIdRows[$i]);
              //   $message .= " $rows->name;";
              //   $rows->delete();
              // }
              // session()->flash('success', "Видалено $count запис(-ів):$message");
              return $this->redirect( route('pro.devices'),navigate:true);
            }
          }
        } catch (\Exception $th) {
            dd($th);
        }
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
    //   flash( "{$device->dev_type->name} :: {$device->brand->name} :: {$device->name} додано до пакування.");
      flash("{$device->name} покладено у пакет");
    }


    public function render()
    {
//  Debugbar::info( [$this->getDevices()]);

        return view('livewire.comp.devices.pro-devices',[
          'rows'=> Device::all()])
        ->layoutData([
              'titlePage'=>$this->titlePage])
        ->layout('components.layouts.main');
    }
}
