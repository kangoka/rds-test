@extends('layouts.app')

@section('content')
<div class="col-md-6 col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vertical Form</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ url('admin/barang/tambah') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" id="nama" class="form-control" name="nama"
                                        placeholder="Lem Fox" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" class="form-control" name="stok"
                                        placeholder="1000" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="harga">Harga (@)</label>
                                    <input type="number" id="harga" class="form-control" name="harga"
                                        placeholder="100000" />
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Tambah
                                </button>
                                {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    Reset
                                </button> --}}
                                <a href="{{ route('admin.barang.index') }}" class="btn btn-light-danger me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
