<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $storeData = $request->validate([
            'gambar_produk' => 'required|file|max:7000',
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'stok' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'jenis_pembayaran' => 'required|max:255'
        ]);

        if($request->file('gambar_produk')) {
            $storeData['gambar_produk'] = $request->file(['gambar_produk'])->store('images');
        }

        $product = Product::create($storeData);

        return redirect('/products')->with('completed', 'Data produk berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $updateData = $request->validate([
            'gambar_produk' => 'nullable|file|max:7000',
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'stok' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'jenis_pembayaran' => 'required|max:255'
        ]);

        if($request->file('gambar_produk')) {
            $updateData['gambar_produk'] = $request->file(['gambar_produk'])->store('images');
        }

        Product::whereId($id)->update($updateData);
        return redirect('/products')->with('completed', 'Data produk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('completed', 'Data produk berhasil dihapus.');
    }
}
