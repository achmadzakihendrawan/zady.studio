<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
 protected $fillable = ['nama', 'harga', 'deskripsi', 'stok', 'gambar'];   //
}
