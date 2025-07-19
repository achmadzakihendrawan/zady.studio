@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-3xl font-bold text-center mb-6">🛠️ Buat Lanyard Custom</h1>
    <p class="text-center text-gray-600 mb-4">Isi form di bawah untuk melakukan pemesanan lanyard sesuai keinginanmu.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('custom.submit') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="jenis" class="form-label">Jenis Lanyard</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="satin">Satin</option>
                <option value="tisu">Tisu</option>
                <option value="polyester">Polyester</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="form-label">Jumlah (pcs)</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="desain" class="form-label">Upload Desain (Opsional)</label>
            <input type="file" name="desain" id="desain" class="form-control">
        </div>

       <label for="catatan" class="form-label">Keterangan Tambahan</label>
<textarea name="catatan" id="catatan" rows="4" class="form-control"></textarea>


        <div class="text-center">
            <button type="submit" class="btn btn-dark px-4 py-2">Kirim Permintaan</button>
        </div>
    </form>
</div>
@endsection
