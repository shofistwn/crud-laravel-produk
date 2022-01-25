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
  img {
    max-width: 100px;
    width: 100%;
    display: block;
  } 
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
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
      <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" value="{{ $product->nama_produk }}"/>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $product->deskripsi }}"/>
        </div>
        <div class="form-group">
            <label>Stok</label>
            
            <select name="stok" class="form-control">
              @for ($i = 0; $i <= 100; $i++) {
                <option value="{{ $i }}" {{ $product->stok == $i ? 'selected' : '' }}>{{ $i }}</option>
              }
              @endfor
            </select>

        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" class="form-control" name="harga_beli" value="{{ $product->harga_beli }}"/>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" class="form-control" name="harga_jual" value="{{ $product->harga_jual }}"/>
        </div>
        <div class="form-group">
            <label>Jenis Pembayaran</label>

            <div class="radio">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Debit" id="flexRadioDefault1" {{ $product->jenis_pembayaran == 'Debit' ? 'checked' : '' }}>Debit
            </div>
            <div class="radio">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="Kredit" id="flexRadioDefault1" {{ $product->jenis_pembayaran == 'Kredit' ? 'checked' : '' }}> Kredit
            </div>
        </div>
        <div class="form-group">
            <label>Gambar Produk</label>
            <img src="{{asset('storage/' . $product->gambar_produk)}}">
            <input type="file" class="form-control" name="gambar_produk" value="{{asset('storage/' . $product->gambar_produk)}}"/>
        </div>
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection