<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoPendaftaran;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InfoPendaftaranController extends Controller
{
    public function index(Request $request)
    {
        
        $pagination = 2;
        $data = InfoPendaftaran::get();
        return view('admin.info-pendaftaran.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.info-pendaftaran.create');
    }

    public function insert(Request $request)
    {
        $request->validate(InfoPendaftaran::$rules);
        $requests = $request->all();
        $requests['file'] = "";
        if($request->hasFile('file')) {
            
            $files = $requests['title'] . "-File-" . $request->file->getClientOriginalName();
            $request->file('file')->move("profil/info-pendaftaran/", $files);
            $requests['file'] = "profil/info-pendaftaran/" . $files;
        }
        
        $cat = InfoPendaftaran::create($requests);
        if($cat){
            return redirect('admin/info-pendaftaran')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/info-pendaftaran')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = InfoPendaftaran::find($id);
        return view('admin.info-pendaftaran.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = InfoPendaftaran::find($id);
        if ($d == null){
            return redirect('admin/info-pendaftaran')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        if($request->hasFile('file')) {
            if($d->file !== null){
                File::delete("$d->file");
            }
            $files = $requests['title'] . "-File-" . $request->file->getClientOriginalName();
            $request->file('file')->move("profil/info-pendaftaran/", $files);
            $req['file'] = "profil/info-pendaftaran/" . $files;
        }
        
        $data = InfoPendaftaran::find($id)->update($req);
        if($data){
            return redirect('admin/info-pendaftaran')->with('status', 'Data Berhasil diedit !');
        }

        return redirect('admin/info-pendaftaran')->with('status', 'Gagal edit data!');
        
    }

    public function delete($id)
    {
    $data = InfoPendaftaran::find($id);
    if ($data == null) {
        return redirect('admin/info-pendaftaran')->with('status', 'Data tidak ditemukan !');
    }
    if ($data->file !== null || $data->file !== "") {
        file::delete("$data->file");
    }
    $delete = $data->delete();
    if ($delete) {
        return redirect('admin/info-pendaftaran')->with('status', 'Berhasil hapus data !');
    }
    return redirect('admin/info-pendaftaran')->with('status', 'Gagal hapus data !');
    }
}
