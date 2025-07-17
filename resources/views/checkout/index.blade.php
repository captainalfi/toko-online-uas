@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Checkout</h2>

    @if(empty($cart))
        <p class="text-gray-600">Keranjang kamu masih kosong.</p>
    @else
        <table class="min-w-full table-auto mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Produk</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php 
                        $subtotal = $item['price'] * $item['quantity']; 
                        $total += $subtotal; 
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $item['name'] }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right text-xl font-semibold mb-4">
            Total: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        <!-- Tombol Bayar -->
        <div class="text-right">
            <button 
                class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600" 
                onclick="showInvoice()">
                💳 Bayar Sekarang
            </button>
        </div>

        <!-- Pop-up invoice -->
        <div id="invoice-popup" class="mt-6 p-4 bg-green-100 border border-green-400 rounded text-green-800 d-none" style="display: none;">
            <h3 class="text-lg font-bold mb-2">✅ Pembayaran Berhasil!</h3>
            <p>Invoice #: INV{{ now()->timestamp }}</p>
            <p>Total: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></p>
            <p>Terima kasih telah berbelanja di PianoLegacy 🎹</p>
        </div>

        <!-- Script untuk menampilkan pop-up -->
        <script>
            function showInvoice() {
                const popup = document.getElementById('invoice-popup');
                popup.style.display = 'block';
            }
        </script>
    @endif
</div>
@endsection
