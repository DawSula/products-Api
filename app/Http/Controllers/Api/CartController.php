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

        return response()->json($sessionCart, 204);
    }
    public function update(){
        $data = $this->request->all();
        // $this->request->session()->forget('cart');
        // return redirect()->route('list');

        $product = Product::find($data['id']);
        $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
        $cart = new Cart($sessionCart);
        $cart->addItem($product);
        $products = $cart->getItems();

        $sessionCart = $this->request->session()->put('cart', $products);
        dd($product);
        return response()->json('Added to shopping cart succesfully');
    }
    public function create(){
        $this->request->session()->start();
        $data = $this->request->all();
        // $this->request->session()->forget('cart');
        // return redirect()->route('list');

        $product = Product::find($data['id']);
        $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
        $cart = new Cart($sessionCart);
        $cart->addItem($product);
        $products = $cart->getItems();

        $sessionCart = $this->request->session()->put('cart', $products);
        $c = $this->request->session()->put('key', 'hello');
        dd($c);

        return response()->json('Shopping cart created successfully');
    }
}
