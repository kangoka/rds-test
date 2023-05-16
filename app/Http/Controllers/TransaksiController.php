<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use Auth;

class TransaksiController extends Controller
{
    public function beli($data)
    {
        $data = explode(",", $data);
        $data = [explode("_", $data[0])[1], (int)$data[1]];

        $barang = Barang::find($data[0]);

        if (!$barang) {
            return redirect('dashboard')->with('status', 'Tidak dapat menemukan barang dengan ID: ') . $id;
        }

        $total = $barang->harga * $data[1];

        $transaksi['id_user'] = Auth::user()->id;
        $transaksi['nama_user'] = Auth::user()->name;
        $transaksi['id_barang'] = $barang->id;
        $transaksi['kuantitas'] = $data[1];
        $transaksi['harga'] = $total;

        $check = Transaksi::create($transaksi);

        if ($check) {
            $barang->decrement('stok', $data[1]);
            return redirect('dashboard')->with('status', 'Berhasil membeli: ');
        }

        return redirect('dashboard')->with('status', 'Gagal membeli barang');
    }
}
