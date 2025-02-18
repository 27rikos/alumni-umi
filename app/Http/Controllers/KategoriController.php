<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $data=Category::all();
        return view('admin.kategori.index',compact('data'));
    }

    public function create(){
        return view('admin.kategori.create');
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'nama'=>'required'
        ]);
        Category::create($validateData);
        return redirect()->route('kategori-berita.index')->with('toast_success','Kategori Berhasil Ditambahkan');
    }

    public function edit($id){
        $data=Category::findOrFail($id);
        return view('admin.kategori.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $data=Category::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kategori-berita.index')->with('toast_success','Kategori Berhasil Diubah');
    }

    public function destroy($id){
        $data=Category::findOrFail($id);
        $data->delete();
        return redirect()->route('kategori-berita.index')->with('toast_success','Kategori Berhasil Dihapus');
    }
}