<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomOrder;

class CustomOrderController extends Controller
{
    public function index()
    {
        return view('custom.index');
    }

    public function submit(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'catatan' => 'nullable|string',
        'jenis' => 'required|string',
        'desain' => 'nullable|file|mimes:png,jpg,pdf',
    ]);

    $path = null;
    if ($request->hasFile('desain')) {
        $path = $request->file('desain')->store('desain', 'public');
    }

    CustomOrder::create([
        'nama' => $request->nama,
        'catatan' => $request->catatan,
        'jenis' => $request->jenis,
        'desain' => $path,
    ]);

    return redirect()->back()->with('success', 'Pesanan custom berhasil dikirim!');
}

}
