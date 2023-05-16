@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif
<section class="section">
    <div class="card">
        <div class="card-header">Daftar Barang</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga (@)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $barang)
                        <tr>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>
                                <a href="{{ route('admin.barang.edit', $barang->id) }}"
                                    class="btn btn-light-success me-1 mb-1">Edit</a>
                                <a href="{{ route('admin.barang.destroy', $barang->id) }}"
                                    class="btn btn-light-danger me-1 mb-1">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset("assets/extensions/jquery/jquery.min.js") }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset("assets/js/pages/datatables.js") }}"></script>
@endsection