<?php

namespace App\Livewire\Pro\Comp;

use Livewire\Component;
use App\Models\Order;

class DevicesCart extends Component
{
    public $cart =[];

    public $total = 0;

    public function mount(){
        $this->cart = session()->get('cart',[]);
        $this->calculateTotal();
    }

    public function updateQuantity($deviceId, $quantity){
        if (isset($this->cart[$deviceId]) && $quantity > 0 ){
            $this->cart[$deviceId]['quantity'] = $quantity;
            session()->put('cart', $this->cart);
            $this->calculateTotal();
            flash('Пакет оновлено.');
        }
    }

    public function removeFromCart($deviceId){
        if (isset($this->cart[$deviceId])){
            unset($this->cart[$deviceId]);
            session()->put('cart', $this->cart);
            $this->calculateTotal();
        }

    }

    public function confirmOrder(){
        if(empty($this->cart)){
            // danger - червоний
            flash('Пакет порожній. Додайте пристрої для запакування', 'warning');
        }
        $orderTotal = 0;
        foreach ($this->cart as $deviceId => $item){
            // $deviceTotal = $item['price']*$item['quantity'];
            $deviceTotal = $item['quantity'];
            $orderTotal += $deviceTotal;
            Order::create([
                'device_id'=> $deviceId,
                'user_id'=> Auth::id(),
                'quantity' =>$item['quantity'],
                'total_price' =>$deviceTotal,
            ]);
        }
        session()->forget('cart');

        $this->cart = [];
        $this->total = 0;
        flash("Пакування підтведжено! Зформовано пакет із $orderTotal од.");
    }


    public function calculateTotal(){
        $this->total = array_reduce($this->cart, function($carry, $item) {
            return $carry + ($item['quantity']);
        }, 0);

    }

    public function render()
    {
        return view('livewire.pro.comp.devices-cart',[
            'cart'=> $this->cart,
            'total'=> $this->total
        ]);
    }
}
