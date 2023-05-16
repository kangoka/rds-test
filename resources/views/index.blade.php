@extends('layouts.app')

@section('content')
<section class="section">
  @foreach ($barang as $barang)
  <div class="col-xl-4 col-md-6 col-sm-12">
  <div class="card">
      <div class="card-content">
          <div class="card-body">
              <h4 class="card-title">{{ $barang->nama }}</h4>
              <span class="badge bg-primary">Harga <br>Rp. {{ number_format($barang->harga, 0, '', '.') }}</span>
              <span class="badge bg-primary float-end">Stok <br>{{ number_format($barang->stok, 0, '', '.') }}</span>
          </div>
          <img class="img-fluid w-100" src="./assets/compiled/jpg/banana.jpg" alt="Card image cap" />
      </div>
      <div class="card-footer d-flex justify-content-between">
          <input type="number" class="form-control p-2" name="barang_{{ $barang->id }}" id="barang_{{ $barang->id }}" min="1" max="{{ $barang->stok }}">
          <button class="btn btn-light-primary" onclick="beli('barang_{{ $barang->id }}')">Beli</button>
      </div>
  </div>
  </div>
@endforeach
</section>
@endsection

@section('js')
<script>
  function beli (id) {
    console.log(id, "asdasd")
    let kuantitas = document.getElementById(id).value > 1 ? document.getElementById(id).value : 1
    let data = [id, kuantitas]
    window.location.replace("http://localhost:8000/beli/" + data);
  }
</script>
@endsection