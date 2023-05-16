<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use Auth;

class PageController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $transaksi = Transaksi::all();

        return view('admin.dashboard', [
            'transaksi' => $transaksi
        ]);
    }

    // User Dashboard
    public function udashboard()
    {
        $transaksi = Transaksi::where('id_user', Auth::id())->get();

        return view('dashboard', [
            'transaksi' => $transaksi
        ]);
    }

    public function index()
    {
        $barang = Barang::all();

        return view('index', [
            'barang' => $barang
        ]);
    }

    public function order()
    {
        return view('index');
    }
}
