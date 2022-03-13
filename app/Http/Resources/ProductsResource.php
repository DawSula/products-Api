<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>ucfirst(strtolower($this->title)),
            'price'=>number_format($this->price, 2, '.', ' ') . " USD",
            'href' => [
                'product'=> route('products.show',$this->id)
            ]
        ];
    }
}
