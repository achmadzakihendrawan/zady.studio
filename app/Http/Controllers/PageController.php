<?php

namespace App\Http\Controllers;
use App\Models\Produk;
class PageController extends Controller
{
    public function home() {
        return view('home');
    }

   public function produk()
{
    $produks = Produk::latest()->get(); // atau paginate()
    return view('produk.index', compact('produks'));
}


    public function custom()
{
    return view('custom.index');
}


    public function tentang() {
        return view('tentang');
    }

    public function kontak() {
        return view('kontak');
    }
}
