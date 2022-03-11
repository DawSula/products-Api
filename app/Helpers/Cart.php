<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    private $items;
    private $price;

    public function __construct($items)
    {
        $this->items = $items ?? [];
    }

    public function addItem(Product $data){

        if(array_key_exists($data->id, $this->items)){
            $this->items[$data->id]['count']++;
            $this->items[$data->id]['totalPrice']+= $data->price;
        }
        else{
            $this->items[$data->id] = [
                'title' => $data->name,
                'totalPrice' => $data->price,
                'count'=> 1,
            ];
        }

    }

    public function getItems(){
        return $this->items;
    }
}

