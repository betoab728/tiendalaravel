<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeControler;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\CreateOrder;

use App\Http\Livewire\PaymentOrder;

use App\Http\Controllers\WebhooksController;

Route::get('/',WelcomeControler::class);

Route::get('search',SearchController::class)->name('search') ;

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show') ;

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth'])->group(function(){

    Route::get('orders',[OrderController::class,'index'])->name('orders.index');



Route::get('orders/create',CreateOrder::class)->name('orders.create');

route::get('orders/{order}',[OrderController::class,'show'])->name('orders.show');

Route::get('orders/{order}/payment',PaymentOrder::class)->name('orders.payment');

Route::get('orders/{order}/pay',[OrderController::class,'pay'])->name('orders.pay');

Route::post('webhooks',WebhooksController::class);


});