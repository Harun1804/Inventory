<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id', 'desc')->paginate(10);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);
        Kategori::create($request->all());
        return redirect(route('kategori.index'))->with('status', 'Kategori Telah Dibuat');
    }

    public function show($id)
    {
        Kategori::where('id', $id)->delete();
        return redirect(route('kategori.index'))->with('status', 'Kategori Telah Dihapus');
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        Kategori::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect(route('kategori.index'))->with('status', 'Kategori Telah Diperbaharui');
    }
}
