<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProduct;
use App\Http\Resources\ProductsResource;
use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function list(){

        return ProductsResource::collection(Product::all());
    }

    public function create(AddProduct $request){
            $data = $request->validated();
            $this->product->addProduct($data);


            return response()->json('Product added successfully');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $product = Product::find($id);
        $this->product->updateProduct($product, $data);

        return response()->json('Product updated successfully');

    }
}
