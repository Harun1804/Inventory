<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'desc')->get();
        return view('supplier.index', compact('supplier'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|same:password1',
            'password1' => 'required|same:password',
            'alamat' => 'required',
            'telepon' => 'required|numeric'
        ]);
        $user = new User();
        $user->role = 'supplier';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        Supplier::create($request->only(['alamat', 'telepon', 'keterangan', 'user_id']));
        return redirect(route('admin.supplier.index'))->with('status', 'Data Berhasil Masuk');
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', '=', $id)->update([
            'name' => $request->name,
            'email'=>$request->email
        ]);
        Supplier::where('user_id', '=', $id)->update([
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);
        return redirect(route('admin.supplier.index'))->with('status', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Supplier::destroy($id);
        User::where('id','=',$id)->delete();
        return redirect(route('admin.supplier.index'))->with('status', 'Data Berhasil Dihapus');
    }
}
