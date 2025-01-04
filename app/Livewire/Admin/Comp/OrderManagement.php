<?php

namespace App\Livewire\Admin\Comp;

use Livewire\Component;
use App\Mail\OrderApprovedMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderManagement extends Component
{

    public $titlePage = 'Order Management.';
    public function approveOrder($orderId){
        $order = Order::with(['user', 'device'])->find($orderId);

        if ($order){
            $order->update(['status'=>'appoved']);

            //Send the email
            Mail::to($order->user->email)->send(new OrderApprovedMail($order));

            // Флеш повідомлення
            flash("Order #{$order->id} approved successfully, and the user has been notified");

        } else {
            // Флеш повідомлення
            flash("Order #{$order->id} not found",'danger');
        }
    }
    public function cancelOrder($orderId){
        $order = Order::find($orderId);

        $order->update(['status'=> 'cancelled']);

        flash('Order cancelled successfully!');
    }

    public function render()
    {
        return view('livewire.admin.comp.order-management',[
            'orders'=>Order::with('device', 'user')->get(),
        ])
        ->layoutData([
            'titlePage'=>$this->titlePage])
        ->layout('components.layouts.app');
    }
}
