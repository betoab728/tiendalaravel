<div x-data>
  <p class="text-xl text-gray-700">color  </p>

  <select wire:model="color_id" class="form-control w-full">
        <option value="" selected disabled>Selecciona un color</option>
        @foreach ($colors as $color)
            <option value="{{$color->id}}">{{$color->name}}</option>
        @endforeach
  </select>
    <p class="text-gray-700 mb-4 my-4">
        <span class="font-semibold text-lg"> Stock disonible:</span>

        @if ($quantity)
            {{$quantity}}
        @else
            {{$product->stock}}
        @endif
    </p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button 
                disabled
                x-bind:disabled="$wire.qty <=1"
                wire:loading.attr="disabled"
                wire:target="decrement"
            wire:click="decrement">    
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{$qty}}</span>
    
            <x-jet-secondary-button 
            x-bind:disabled="$wire.qty >=$wire.quantity"
            wire:loading.attr="disabled"
            wire:target="increment"
            wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button
            x-bind:disabled="!$wire.quantity"
            color="orange" class="w-full"
            wire:click="addItem"
            wire:loading.attr="disabled"
            wire:target="addItem">
                Agregar al carrito de compras
            </x-button>

        </div>
    </div>
</div>
