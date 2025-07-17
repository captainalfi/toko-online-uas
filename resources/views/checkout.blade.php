@extends('layouts.app')

@section('content')
    <h2 class="mb-4 fw-bold">🧾 Checkout</h2>

    @if(count($cart) > 0)
        <ul class="list-group mb-4">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item['name'] }}</strong><br>
                        <small>{{ $item['description'] }}</small>
                    </div>
                    <span class="badge bg-primary">
                        {{ $item['quantity'] }}x Rp {{ number_format($item['price'], 0, ',', '.') }}
                    </span>
                </li>
            @endforeach
        </ul>

        @php
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        @endphp

        <div class="mb-3">
            <h5>Total Pembayaran: <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span></h5>
        </div>

        <div class="text-end">
            <button id="checkout-btn" class="btn btn-primary">💳 Bayar Sekarang</button>
        </div>

        <div id="invoice-popup" class="mt-4 alert alert-success d-none">
            <h4>✅ Pembayaran Berhasil!</h4>
            <p>Invoice #: INV{{ now()->timestamp }}</p>
            <p>Total: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></p>
            <p>Terima kasih telah berbelanja di Pianolegacy 🎹</p>
        </div>
    @else
        <p>🛒 Keranjang kosong. Silakan tambahkan produk terlebih dahulu.</p>
    @endif
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('checkout-btn');
        const popup = document.getElementById('invoice-popup');

        if (btn) {
            btn.addEventListener('click', function () {
                popup.classList.remove('d-none');
                btn.disabled = true;
                btn.classList.add('btn-secondary');
                btn.innerText = "Sudah Dibayar";
            });
        }
    });
</script>
@endpush
