<x-app-layout>
    <div class="container py-12">
        <section class="grid grid-cols-5 gap-6 text-white">
            <div class="bg-red-500 bg-opacity-50 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$orders->where('status',1)->count()}}
                </p>
                <p class="uppercase text-center">pendiente</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-business-time "></i>
                </p>
            </div>  
            <div class="bg-gray-500 bg-opacity-50 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl"> {{$orders->where('status',1)->count()}}</p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </div>  
            <div class="bg-yellow-500 bg-opacity-50 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl"> {{$orders->where('status',1)->count()}}</p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </div>  
            <div class="bg-pink-500 bg-opacity-50 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl"> {{$orders->where('status',1)->count()}}</p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </div>  
            <div class="bg-green-500 bg-opacity-50 rounded-lg px-12 py-8 ">
                <p class="text-center text-2xl"> {{$orders->where('status',1)->count()}}</p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </div>  
        </section>
        <section class="bg-white rounded-lg px-12 py-8 mt-12 text-gray-700">
            <h1 class="text-2xl mb-4">Pedidos recientes</h1>
            <ul>
                @foreach ($orders as $order)
                    <li class="">
                        <a href="{{route('orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                            <span>
                                @switch($order->status)
                                    @case(1)
                                        <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                        @break
                                    @case(2)
                                        <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                        @break
                                    @case(3)
                                        <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                        @break
                                    @case(4)
                                        <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                        @break
                                    @case(5)
                                        <i class="fas fa-business-time text-green-500 opacity-50"></i>    
                                        @break
                                    @default
                                        
                                @endswitch
                            </span>
                            <span>
                                Orden: {{$order->id }}
                                <br>
                                {{$order->created_at -> format('d/m/Y')}}
                            </span>
                            <div class="ml-auto font-bold">
                                <span class="font-bold">
                                    @switch($order->status)
                                        @case(1)
                                            Pendiente
                                            @break
                                        @case(2)
                                            Recibido
                                            @break
                                        @case(3)
                                            Enviado
                                            @break
                                        @case(4)
                                            Entregado
                                            @break
                                        @case(4)
                                            Anulado
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>
                                <br>
                                <span class="text-sm">
                                    {{$order->total}} USD
                                </span>
                            </div>
                           <span>
                                <i class="fas fa-angle-right ml-6"></i>
                           </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>

    </div>
</x-app-layout>