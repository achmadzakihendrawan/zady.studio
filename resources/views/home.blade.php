@extends('layouts.app')

@section('content')
    <section class="text-center py-16 px-4 bg-gradient-to-b from-white to-gray-100 rounded-xl shadow-lg">
        <div class="max-w-2xl mx-auto animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight leading-tight">
                Selamat Datang di <span class="text-black">ZADY</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 mb-8">
                Lanyard custom premium untuk <strong>perusahaan</strong>, <strong>event</strong>, dan <strong>sekolah</strong>. Didesain untuk tampil profesional dan elegan.
            </p>
            <a href="/produk"
               class="btn btn-primary px-5 py-3 rounded-pill shadow hover:shadow-lg transition-all">
               Lihat Produk
            </a>
        </div>
    </section>

    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }
    </style>
@endsection
