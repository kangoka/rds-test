<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Str;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        return view('admin.barang.index', [
            'barang' => $barang
        ]);
    }

    public function create()
    {
        return view('admin.barang.tambah');
    }

    public function store(Request $request)
    {
        $requests = $request->all();
        $requests['slug'] = "";
        $requests['slug'] = Str::slug($request->nama);
        $barang = Barang::create($requests);
        if($barang){
            return redirect('admin/barang')->with('status', 'Berhasil menambah barang!');
        }

        return redirect('admin/barang')->with('status', 'Gagal menambah barang!');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('admin.barang.index')->with('status', "Tidak dapat menemukan ID: " . $id);
        }

        return view('admin.barang.edit', [
            'barang' => $barang
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('admin.barang.index')->with('status', "Tidak dapat menemukan ID: " . $id);
        }

        $requests = $request->all();
        $requests['slug'] = Str::slug($request->nama);

        $data = $barang->update($requests);
        if($data) {
            return redirect()->route('admin.barang.index')->with('status', 'Barang berhasil di edit!');
        }
        
        return redirect()->route('admin.barang.index')->with('status', 'Barang gagal di edit');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            $barang->delete();

            return redirect()->route('admin.barang.index')->with('status', 'Barang berhasil di hapus!');
        }

        return redirect()->route('admin.barang.index')->with('status', 'Gagal menghapus barang dengan ID: ' . $id);
    }
}
