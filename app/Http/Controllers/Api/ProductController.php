<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProduct;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsResource;
use App\Repositories\ProductRepository;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function list()
    {
        try{
            return ProductsResource::collection(Product::all());
        }catch (Exception $e) {
            return response()->json(['errors' => [['message' => 'Products not found']]]);
        }

    }

    public function show($id)
    {
        try {
            return new ProductResource(Product::findOrFail($id));
        } catch (Exception $e) {
            return response()->json(['errors' => [['message' => 'Product not found']]]);
        }
    }

    public function create(AddProduct $request)
    {
        try {
            $data = $request->validated();
            $this->product->addProduct($data);
            return response()->json('Product added successfully');
        } catch (Exception $e) {
            return response()->json(['errors' => [['message' => $e->getMessage()]]]);
        }
    }

    public function update(AddProduct $request, $id)
    {
        try {
            $data = $request->validate();
            dd($data);
            $product = Product::findOrFail($id);
            $this->product->updateProduct($product, $data);

            return response()->json('Product updated successfully');
        } catch (Exception $e) {
            return response()->json(['errors' => [['message' => $e->getMessage()]]]);
        }
    }
}
