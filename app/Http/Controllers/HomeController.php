<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = collect([
            (object)['name' => '商品1', 'price' => 100, 'description' => '這是商品'],
            (object)['name' => '商品2', 'price' => 200, 'description' => '這是商品'],
            (object)['name' => '商品3', 'price' => 300, 'description' => '這是商品'],
        ]);
        $data = ['products' => $products];
        return view('home.index', $data);
    }

}
