<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddProduct;

class ProductController extends Controller
{
    public function list(){

        return view('list', ['products'=>Product::all()]);
    }

    public function add(Request $request){
            $data = $request->all();
            dd($data);

            redirect()->route('list');
    }
}
