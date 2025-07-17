<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Piano Akustik Yamaha U1',
                'description' => 'Piano akustik klasik dengan suara jernih.',
                'price' => 25000000,
                'image' => 'yamaha-u1.png',
            ],
            [
                'id' => 2,
                'name' => 'Digital Piano Roland FP-30X',
                'description' => 'Digital piano modern dengan fitur Bluetooth.',
                'price' => 18000000,
                'image' => 'roland-fp30x.png',
            ],
            [
                'id' => 3,
                'name' => 'Grand Piano Kawai GL-10',
                'description' => 'Grand piano elegan untuk konser.',
                'price' => 75000000,
                'image' => 'kawai-gl10.png',
            ],
        ];

        return view('products', compact('products'));
    }
}
