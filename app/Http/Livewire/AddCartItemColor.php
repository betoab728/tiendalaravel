<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\support\Facades\Storage;


class AddCartItemColor extends Component
{
    public $product,$colors;
    public $color_id="";
    public $qty=1;
    public $quantity=0;
    public $option=[
        'size_id'=>null
    ];

    public function mount(){
        $this->colors=$this->product->colors;
        $this->option['image']=Storage::url($this->product->images->first()->url);
    }
    public function updatedColorId($value){
        $color= $this->product->colors->find($value);
        $this->quantity= qty_available($this->product->id,$color->id);
        $this->option['color']= $color->name;
    }
   

    
    public function decrement(){
        $this->qty=$this->qty-1;
    }

    public function increment(){
        $this->qty=$this->qty+1;
    }
    public function addItem(){
        Cart::add(['id' => $this->product->id,
                    'name' => $this->product->name,
                    'qty' => $this->qty, 
                    'price' => $this->product->price,
                    'weight' =>550,
                    'options' =>$this->option
          ]);
          $this->quantity=   qty_available($this->product->id,$this->color_id);
          $this->reset('qty');

          $this->emitTo('dropdown-cart','render');
    }
    

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
