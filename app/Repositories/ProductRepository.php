<?php

namespace App\Repositories;

use App\Facade\Filter;
use App\Models\Product;

//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository
{

    public function addProduct($data)
    {
        $newProduct = new Product([
            'title' => Filter::formatData($data['title']),
            'price' => round(($data['price']), 2),
        ]);


        $newProduct->save();
    }

    public function updateProduct(Product $product, array $data)
    {

        $title = $data['title'] ?? null;
        $price = $data['price'] ?? null;

        $product->title = $title ? Filter::formatData($data['title']) : $product->title;
        $product->price = $price ? round(($data['price']), 2) : $product->price;
        $product->save();
    }
}
