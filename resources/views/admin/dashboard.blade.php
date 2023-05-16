@extends('layouts.app')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">Transaksi</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Pembeli</th>
                            <th>Barang</th>
                            <th>Kuantitas</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->nama_user }} ({{ $transaksi->id_user }})</td>
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
