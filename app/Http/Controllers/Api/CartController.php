<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller

{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function list(){

        $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
        $sessionCart = $this->request->session()->get('cart');

        return response()->json(['data'=>$sessionCart]);
    }
    public function add($id){

        $product = Product::find($id);
        $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
        $cart = new Cart($sessionCart);
        $cart->addItem($product);
        $this->request->session()->put('cart', $cart->getItems());

        return response()->json('Added to shopping cart succesfully');
    }

}
