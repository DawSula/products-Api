<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CartController extends Controller

{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function list()
    {
        try {
            $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
            $sessionTotalPrice = $this->request->session()->has('totalPrice') ? $this->request->session()->get('totalPrice') : null;
            $sessionCart = $this->request->session()->get('cart');
            $sessionTotalPrice = $this->request->session()->get('totalPrice');

            return response()->json(['data' => $sessionCart, 'totalPrice' => $sessionTotalPrice]);
        } catch (Exception $e) {
            return response()->json(['errors' => [['message' => 'cart error']]]);
        }
    }
    public function add($id)
    {
        try {
            $product = Product::findOrFail($id);
            $sessionCart = $this->request->session()->has('cart') ? $this->request->session()->get('cart') : null;
            $cart = new Cart($sessionCart);
            $cart->addItem($product);
            $this->request->session()->put('cart', $cart->getItems());
            $this->request->session()->put('totalPrice', $cart->getTotalPrice());

            return response()->json('Added to shopping cart succesfully');
        } catch (Exception $e) {
            return response()->json(['errors' => [['message' => 'Cant add item to cart']]]);
        }
    }
}
