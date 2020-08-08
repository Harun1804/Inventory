<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kategori;
use App\Model\Produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('kategori_id', 'desc')->paginate(10);
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'kategori_id' => 'required'
        ]);
        Produk::create($request->all());
        return redirect(route('produk.index'))->with('status', 'Produk Telah Ditambahkan');
    }

    public function show($id)
    {
        Produk::where('id', $id)->delete();
        return redirect(route('produk.index'))->with('status', 'Produk Telah Dihapus');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::where('id', $id)->first();
        return view('admin.produk.edit', compact(['produk', 'kategori']));
    }

    public function update(Request $request, $id)
    {
        Produk::where('id', $id)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect(route('produk.index'))->with('status', 'Produk Telah Diperbaharui');
    }
}
