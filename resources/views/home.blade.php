@extends('layouts.app')

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }

    body > .hero-section {
        margin: 0 !important;
        padding: 0 !important;
    }

    .hero-section {
        position: relative;
        width: 100vw;
        height: 100vh;
        background: url('/images/piano-bg.png') no-repeat center center;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.55);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        background-color: rgba(255, 255, 255, 0.85);
        padding: 3rem;
        border-radius: 1rem;
        text-align: center;
        max-width: 800px;
        width: 90%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Ini buat ngehapus padding default container di layout */
    .container, .container-fluid {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
    }
</style>


<div class="hero-section">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="display-4 fw-bold mb-3">
            🎶 Selamat Datang di <span class="text-primary">PianoLegacy</span>
        </h1>
        <p class="lead mb-4">
            Piano Bekas Berkualitas, Harga Bersahabat.
        </p>
        <p class="mb-4">
            Temukan harmoni antara suara, kualitas, dan kenyamanan.  
            <br>Kami menghadirkan pilihan terbaik untuk pecinta musik sejati.
        </p>
        <a href="{{ url('/products') }}" class="btn btn-primary btn-lg shadow px-4 py-2">
            Jelajahi Katalog Produk
        </a>
    </div>
</div>
@endsection
