@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold">Produk Lanyard ZADY</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
        @foreach($produks as $produk)
            <div class="col d-flex justify-content-center">
                <div class="card h-100 shadow border-0 rounded-4" style="max-width: 280px;">
                    @if ($produk->gambar)
                        <div class="bg-light rounded-top-4 overflow-hidden">
                            <img 
                                src="{{ asset('storage/' . $produk->gambar) }}" 
                                alt="{{ $produk->nama }}"
                                class="w-100 d-block"
                                style="height: auto;">
                        </div>
                    @else
                        <div class="p-5 bg-secondary text-white text-center rounded-top-4">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $produk->nama }}</h5>
                        <p class="card-text text-muted mb-3">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="https://wa.me/6281210721669?text=Saya%20ingin%20pesan%20{{ urlencode($produk->nama) }}" 
                           target="_blank" 
                           class="btn btn-success rounded-pill px-4 shadow-sm">
                            <i class="bi bi-whatsapp me-2"></i> Pesan via WA
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 
