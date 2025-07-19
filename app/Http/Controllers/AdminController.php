<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count();

        return view('admin.dashboard', compact('jumlahProduk'));
    }
}

