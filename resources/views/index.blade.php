@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
  img {
    max-width: 100px;
    width: 100%;
  }
</style>

<a href="http://127.0.0.1:8000"><button class="btn btn-primary">Tambah Produk</button></a>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Gambar Produk</td>
          <td>Nama Produk</td>
          <td>Deskripsi</td>
          <td>Stok</td>
          <td>Harga Beli</td>
          <td>Harga Jual</td>
          <td>Jenis Pembayaran</td>
          <td class="text-center">Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $products)
            <td>{{$products->id}}</td>
            <td><img src="{{asset('storage/' . $products->gambar_produk)}}"></td>
            <td>{{$products->nama_produk}}</td>
            <td>{{$products->deskripsi}}</td>
            <td>{{$products->stok}}</td>
            <td>Rp {{$products->harga_beli}}</td>
            <td>Rp {{$products->harga_jual}}</td>
            <td>{{$products->jenis_pembayaran}}</td>
            <td class="text-center">
                <a href="{{ route('products.edit', $products->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $products->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection