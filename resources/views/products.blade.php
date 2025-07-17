@extends('layouts.app')

@section('content')
    <h2 class="mb-4 text-center fw-bold">🎹 Katalog Produk Piano</h2>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/' . $product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="text-primary fw-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>

                        {{-- Tombol Tambah ke Keranjang --}}
                        <form action="{{ route('cart.add', $loop->index) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">
                                🛒 Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
