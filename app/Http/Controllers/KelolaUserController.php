<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('name', 'email', 'role', 'id', 'fakultas', 'prodi')->whereIn('role', ['admin', 'fakultas'])->get();
        return view("admin.KelolaUser.Index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.KelolaUser.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'fakultas' => 'nullable',
            'role' => 'required',
            'prodi' => 'required',
            'password' => 'required',
        ]);
        $hashedpassword = Hash::make($request->password);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedpassword,
            'role' => $request->role,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
        ]);
        $data->save();
        return redirect()->route('kelolauser.index')->with('toast_success', 'User Berhasil Dibuat');
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
        $prodi = Prodi::all();
        $data = User::findOrFail($id);
        return view('admin.KelolaUser.edit', compact('data', 'prodi'));
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
        $data = User::findOrFail($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('kelolauser.index')->with('toast_success', 'User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('kelolauser.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}