@extends('layouts.app')

@section('content')
    <h2 class="mb-4 fw-bold">🛒 Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <ul class="list-group">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item['name'] }}</strong><br>
                        <small>{{ $item['description'] }}</small>
                    </div>
                    <span class="badge bg-primary">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Keranjang kosong.</p>
    @endif

@if(count($cart) > 0)
    <div class="mt-4 text-end">
        <a href="{{ route('checkout.index') }}" class="btn btn-success">
            🧾 Checkout Sekarang
        </a>
    </div>
@endif

@endsection

