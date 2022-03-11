<?php

namespace App\Repositories;

use App\Models\Product;
use Carbon\Carbon;

//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository
{
  private Product $product;

  public function __construct(Product $product)
  {
    $this->product = $product;
  }

  public function addProduct($data){
      $newProduct = new Product([
          'name'=> $data['name'],
          'price'=> (float) $data['price'],
      ]);

      $newProduct->save();
  }

  public function updateProduct(Product $product, array $data){
    $product->name = $data['name'];
    $product->price = $data['price'];
    $product->save();
  }
}
