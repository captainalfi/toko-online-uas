<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $products = [
            [
                'name' => 'Piano Akustik Yamaha U1',
                'description' => 'Piano akustik klasik dengan suara jernih.',
                'price' => 25000000,
                'image' => 'yamaha-u1.png',
            ],
            [
                'name' => 'Digital Piano Roland FP-30X',
                'description' => 'Digital piano modern dengan fitur Bluetooth.',
                'price' => 18000000,
                'image' => 'roland-fp30x.png',
            ],
            [
                'name' => 'Grand Piano Kawai GL-10',
                'description' => 'Grand piano elegan untuk konser.',
                'price' => 75000000,
                'image' => 'kawai-gl10.png',
            ],
        ];

        $product = $products[$id];
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++; // Kalau udah ada, tambahin jumlah
        } else {
            $cart[$id] = [
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1, // Default jumlah = 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
}


