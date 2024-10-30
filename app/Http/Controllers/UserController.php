<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'user')->get();
        return view('admin.users.index', compact('data'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'npm' => 'required',
            'password' => 'required',
        ]);
        $encryptPassword = Hash::make($request->password);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'npm' => $request->npm,
            'password' => $encryptPassword,
        ]);
        $data->save();
        return redirect()->route('enduser.index')->with('toast_success', 'User Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.users.edit', compact('data'));

    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('enduser.index')->with('toast_success', 'User Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('enduser.index')->with('toast_success', 'User Berhasil Dihapus');
    }
}