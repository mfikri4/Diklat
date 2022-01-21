<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuotaDiklat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KuotaDiklatController extends Controller
{
    public function index(Request $request)
    {
        
        $pagination = 2;
        $data = KuotaDiklat::get();
        return view('admin.kuota-diklat.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.kuota-diklat.create');
    }

    public function insert(Request $request)
    {
        $request->validate(KuotaDiklat::$rules);
        $requests = $request->all();
            
        $cat = KuotaDiklat::create($requests);
        if($cat){
            return redirect('admin/kuota-diklat')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/kuota-diklat')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = KuotaDiklat::find($id);
        return view('admin.kuota-diklat.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = KuotaDiklat::find($id);
        if ($d == null){
            return redirect('admin/kuota-diklat')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        $data = KuotaDiklat::find($id)->update($req);
        if($data){
            return redirect('admin/kuota-diklat')->with('status', 'Data Berhasil diedit !');
        }

        return redirect('admin/kuota-diklat')->with('status', 'Gagal edit data!');
        
    }

    public function delete($id)
    {
    $data = KuotaDiklat::find($id);
    if ($data == null) {
        return redirect('admin/kuota-diklat')->with('status', 'Data tidak ditemukan !');
    }

    $delete = $data->delete();
    if ($delete) {
        return redirect('admin/kuota-diklat')->with('status', 'Berhasil hapus data !');
    }
    return redirect('admin/kuota-diklat')->with('status', 'Gagal hapus data !');
    }
}
