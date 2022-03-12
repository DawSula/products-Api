<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    private $items = [];
    private $price;

    public function __construct($items)
    {
        $this->items = $items ?? [];
    }

    public function addItem(Product $data)
    {



        if ($this->checkId($data->id, $this->items)) {
            foreach ($this->items as $key => $value) {
                if ($value['id'] == $data->id) {
                    $this->items[$key]['count']++;
                    $this->items[$key]['totalPrice'] += $data->price;
                }
            }
        }
        else {
            array_push($this->items, [
                'id' => $data->id,
                'title' => $data->name,
                'totalPrice' => $data->price,
                'count' => 1,
                'href'=>[
                    'product'=> route('show',$data->id)
                ],
            ]);
        }
    }



    public function getItems()
    {
        return $this->items;
    }

    private function checkId($id, $data): bool
    {

        foreach ($data as $value) {

            if ($value['id'] == $id) {
                return true;
                break;
            }
        }
        return false;
    }
}
