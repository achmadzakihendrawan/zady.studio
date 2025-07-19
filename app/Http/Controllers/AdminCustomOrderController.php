<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;

class AdminCustomOrderController extends Controller
{
    public function index()
    {
        $orders = CustomOrder::latest()->get();
        return view('admin.custom.index', compact('orders'));
    }
}

