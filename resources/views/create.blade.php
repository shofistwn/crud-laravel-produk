@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    .radio {
      margin-left: 20px;
    }
    select {
      display: block;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Tambah Produk
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk"/>
          </div>
          <div class="form-group">
              <label>Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi"/>
          </div>
          <div class="form-group">
              <label>Stok</label>
              <select name="stok" class="form-control">
                @for ($i = 0; $i <= 100; $i++) {  
                  <option value="{{ $i }}">{{ $i }}</option>
                }
                @endfor
              </select>
          </div>
          <div class="form-group">
              <label>Harga Beli</label>
              <input type="number" class="form-control" name="harga_beli"/>
          </div>
          <div class="form-group">
              <label>Harga Jual</label>
              <input type="number" class="form-control" name="harga_jual"/>
          </div>
          <div class="form-group">
              <label>Jenis Pembayaran</label>

              <div class="radio">
              <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Debit" id="flexRadioDefault1">Debit
              </div>
              <div class="radio">
              <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Kredit" id="flexRadioDefault1"> Kredit
              </div>
          </div>
          <div class="form-group">
              <label>Gambar Produk</label>
              <input type="file" class="form-control" name="gambar_produk"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
      </form>
  </div>
</div>
@endsection