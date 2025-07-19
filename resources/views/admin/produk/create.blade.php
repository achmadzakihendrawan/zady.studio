@extends('layouts.admin')

@section('content')
    <div class="mb-4 d-flex align-items-center gap-2">
        <i class="bi bi-plus-square fs-4 text-primary"></i>
        <h2 class="fs-4 m-0 fw-semibold">Tambah Produk</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                @csrf

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="col-12 d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-link text-muted">
                        ← Kembali ke daftar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
