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
        <div class="card-header">Daftar Transaksi Anda</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Trx ID</th>
                            <th>ID Barang</th>
                            <th>Kuantitas</th>
                            <th>Harga Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->id_barang }}</td>
                            <td>{{ $transaksi->kuantitas }}</td>
                            <td>{{ $transaksi->harga }}</td>
                            <td>
                                <span class="badge bg-success">Dibayar</span>
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