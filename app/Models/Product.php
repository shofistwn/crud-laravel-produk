<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_produk', 'nama_produk', 'deskripsi', 'stok', 'harga_beli', 'harga_jual', 'jenis_pembayaran'
    ];
}
