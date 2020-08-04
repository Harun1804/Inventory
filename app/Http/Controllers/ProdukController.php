<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use App\Model\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderby('id', 'desc')->get();
        $kategori = Kategori::all();
        return view('produk.index', compact(['produk', 'kategori']));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
        ]);
        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth()->User()->id
        ]);
        if (Auth()->User()->role == 'supplier') {
            return redirect(route('supplier.produk.index'))->with('status', 'Data Berhasil Ditambahkan');
        } else {
            return redirect(route('admin.produk.index'))->with('status', 'Data Berhasil Ditambahkan');
        }
    }

    public function edit($id)
    {
        $produk = Produk::where('id', '=', $id)->get();
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        Produk::where('id', '=', $id)->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi
        ]);
        if (Auth()->User()->role == 'supplier') {
            return redirect(route('supplier.produk.index'))->with('status', 'Data Berhasil Diperbaharui');
        } else {
            return redirect(route('admin.produk.index'))->with('status', 'Data Berhasil Diperbaharui');
        }
    }

    public function delete($id)
    {
        Produk::destroy($id);
        if (Auth()->User()->role == 'supplier') {
            return redirect(route('supplier.produk.index'))->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect(route('admin.produk.index'))->with('status', 'Data Berhasil Dihapus');
        }
    }
}
