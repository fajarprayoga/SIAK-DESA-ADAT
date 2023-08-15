<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $transactions = Transaction::where('created_at', $date)->where([['expense', '<=', 0], ['price_material', '!=', null]])->orWhere('expense', null)->orderBy('id', 'DESC')->with(['material', 'gosek'])->latest()->take(10)->get();
        return view('admin.dashboard.index', compact('transactions'));
    }
}
