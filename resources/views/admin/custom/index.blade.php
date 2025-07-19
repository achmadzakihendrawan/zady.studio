@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">📥 Pesanan Custom</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Catatan</th>
                <th>Desain</th>
                <th>Tanggal</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->nama }}</td>
                    <td>{{ $order->catatan }}</td>
                    <td>
                        @if($order->desain)
                            <a href="{{ asset('storage/' . $order->desain) }}" target="_blank">Lihat</a>
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan custom.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
