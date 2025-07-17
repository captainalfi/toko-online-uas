@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">🎹 Katalog Produk Piano</h1>

    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <h6 class="mt-auto fw-bold text-primary">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h6>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">
                                🛒 Tambahkan ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
