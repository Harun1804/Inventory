<?php

namespace App\Http\Controllers;

use App\Model\Kategori;
use App\Model\Supplier;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'desc')->paginate(10);
        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('supplier.create',compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'alamat' => 'required',
            'telepon' => 'required|numeric'
        ]);
        $user = new User();
        $user->role = 'supplier';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(123);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        Supplier::create($request->only(['alamat', 'telepon', 'user_id','kategori_id']));
        return redirect(route('supplier.index'))->with('status', 'Data Supplier Telah Dibuat');
    }

    public function show($id)
    {
        Supplier::destroy($id);
        User::destroy($id);
        return redirect(route('supplier.index'))->with('status', 'Data Supplier Telah Diperbaharui');
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        Supplier::where('user_id', '=', $id)->update([
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kategori_id' => $request->kategori_id
        ]);
        return redirect(route('supplier.index'))->with('status', 'Data Supplier Telah Dihapus');
    }
}
