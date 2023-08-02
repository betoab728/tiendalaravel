<?php

namespace App\Http\Livewire;
use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\support\Facades\Storage;



class AddCartItemSize extends Component
{
    public $product, $sizes;
    public  $color_id="";
   
    public $qty=1;
    public $quantity=0;

    public $size_id="";

    public $colors=[];
    public $option=[];

    public function updatedSizeId($value){
        $size = Size::find($value); 

        $this->colors=$size->colors;
        $this->option['size']= $size->name;
    }
    public function updatedColorId($value){
        $size = Size::find($this->size_id); 
        $color= $size->colors->find($value);
        $this->quantity=  qty_available($this->product->id, $color->id,$size->id);

        $this->option['color']= $color->name;
    }
   

    public function mount(){
        $this->sizes = $this->product->sizes;
        $this->option['image']=Storage::url($this->product->images->first()->url);
    }
    public function render()
    {
        return view('livewire.add-cart-item-size');
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
          $this->quantity=  qty_available($this->product->id, $this->color_id,$this->size_id);
          $this->reset('qty');
          $this->emitTo('dropdown-cart','render');
    }
}
