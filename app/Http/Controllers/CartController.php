<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


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
    public function add(){


        $data = $this->request->all();
        $product = Product::find($data['id']);
        $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
        $cart = new Cart($sessionCart);
        $cart->addItem($product);
        $products = $cart->getItems();


        $sessionCart = $this->request->session()->put('cart', $products);

        return redirect()->route('list');



    }
}
