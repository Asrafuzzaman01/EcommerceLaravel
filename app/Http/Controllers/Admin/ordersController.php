<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function pendingord(){

        return view('admin.pendingorder');
    }
    public function completeord(){

        return view('admin.completeorder');
    }
    public function cancelord(){

        return view('admin.cancelorder');
    }
}
