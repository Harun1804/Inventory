<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id','desc')->get();
        return view('kategori.index',compact('kategori'));
    }

    public function create(Request $request)
    {
        Kategori::create($request->all());
        return redirect(route('admin.kategori.index'))->with('status', 'Data Berhasil Dibuat');
    }

    public function edit(Kategori $id)
    {
        $kategori = Kategori::find($id->id);
        return view('kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $katagori)
    {
        Kategori::where('id','=',$katagori)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect(route('admin.kategori.index'))->with('status', 'Data Berhasil Diubah');
    }

    public function delete(Kategori $id)
    {
        Kategori::destroy($id->id);
        return redirect(route('admin.kategori.index'))->with('status','Data Berhasil Dihapus');
    }
}
