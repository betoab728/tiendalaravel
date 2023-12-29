<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests as AccessAuthorizesRequests;
use Livewire\Component;

use Iluminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{
    use AccessAuthorizesRequests;
    public $order;
    protected $listeners =['payOrder'];

    public function mount(Order $order){
        $this->order=$order;
        $this->order->save();

        return redirect()->route('orders.show',$this->order);
    }


    public function payOrder(){
        $this->order->status=2;
    }
      
    
    public function render()
    {
        $this->authorize('author',$this->order);
        $this->authorize('payment',$this->order);

        $items =json_decode($this->order->content);
        return view('livewire.payment-order',compact('items'));
    }
}
