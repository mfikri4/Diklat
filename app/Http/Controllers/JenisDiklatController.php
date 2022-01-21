<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDiklat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class JenisDiklatController extends Controller
{
    public function index(Request $request)
    {
        
        $pagination = 2;
        $data = JenisDiklat::get();
        return view('admin.jenis-diklat.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.jenis-diklat.create');
    }

    public function insert(Request $request)
    {
        $request->validate(JenisDiklat::$rules);
        $requests = $request->all();

        $cat = JenisDiklat::create($requests);
        if($cat){
            return redirect('admin/jenis-diklat')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/jenis-diklat')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = JenisDiklat::find($id);
        return view('admin.jenis-diklat.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = JenisDiklat::find($id);
        if ($d == null){
            return redirect('admin/jenis-diklat')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        $data = JenisDiklat::find($id)->update($req);
        if($data){
            return redirect('admin/jenis-diklat')->with('status', 'Data Berhasil diedit !');
        }

        return redirect('admin/jenis-diklat')->with('status', 'Gagal edit data!');
        
    }

    public function delete($id)
    {
    $data = JenisDiklat::find($id);
    if ($data == null) {
        return redirect('admin/jenis-diklat')->with('status', 'Data tidak ditemukan !');
    }

    $delete = $data->delete();
    if ($delete) {
        return redirect('admin/jenis-diklat')->with('status', 'Berhasil hapus data !');
    }
    return redirect('admin/jenis-diklat')->with('status', 'Gagal hapus data !');
    }
}
