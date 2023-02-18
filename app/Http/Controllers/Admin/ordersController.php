<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function pendingord(){

        $pending_orders=order::where('status', 'pending')->latest()->get();

        return view('admin.pendingorder', compact('pending_orders'));
    }


    public function completeord(){

        return view('admin.completeorder');
    }
    public function cancelord(){

        return view('admin.cancelorder');
    }
}
