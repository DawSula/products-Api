<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    private $items = [];
    private float $price;

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
                    $this->items[$key]['totalPrice'] = round(($data->price +  $this->items[$key]['totalPrice']), 2);
                }
            }
        } else {
            $this->items[] = [
                'id' => $data->id,
                'title' => $data->title,
                'totalPrice' => round($data->price, 2),
                'count' => 1,
                'href' => [
                    'product' => route('products.show', $data->id)
                ],
            ];

        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalPrice()
    {
        $this->countPrice();
        return number_format($this->price, 2, '.', ' ') . ' USD';
    }

    private function countPrice()
    {
        $totalPrice = 0;

        foreach ($this->items as $value) {
            $totalPrice += $value['totalPrice'];
        };
        $this->price = $totalPrice;
    }

    private function checkId($id, $data): bool
    {
        foreach ($data as $value) {
            if ($value['id'] == $id) {
                return true;
            }
        }
        return false;
    }
}
