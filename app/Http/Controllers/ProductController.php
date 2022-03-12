<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddProduct;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private ProductRepository $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function list(Request $request){


        return view('list', ['products'=>Product::all()]);
    }

    public function add(AddProduct $request){
            $data = $request->validated();
            $this->product->addProduct($data);


            return redirect()->route('list');
    }

    public function update(Request $request){
        $data = $request->all();
        $product = Product::find($data['id']);
        $this->product->updateProduct($product, $data);
        return redirect()->route('list');

    }
}
