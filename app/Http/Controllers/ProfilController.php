<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    //menampilkan semua data
    
    public function index(Request $request)
    {  
        $pagination = 2;
        $data = Profil::get();
        return view('admin.akun-profil.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.akun-profil.create');
    }

    public function insert(Request $request)
    {
        $request->validate(Profil::$rules);
        $requests = $request->all();
        $requests['file_foto'] = "";
        $requests['file_ktp'] = "";
        $requests['file_ijazah_darat'] = "";
        $requests['file_akte'] = "";
        if($request->hasFile('file_foto')) {
            $files =  $requests['name'] . "-File Foto-" . $request->file_foto->getClientOriginalName();
            $request->file('file_foto')->move("profil/file_foto/", $files);
            $requests['file_foto'] = "file/file_foto/" . $files;
        }

        if($request->hasFile('file_ktp')) {
            $files =  $requests['name'] . "-File KTP-" . $request->file_ktp->getClientOriginalName();
            $request->file('file_ktp')->move("profil/file_ktp/", $files);
            $requests['file_ktp'] = "file/file_ktp/" . $files;
        }
        
        if($request->hasFile('file_ijazah_darat')) {
            $files =  $requests['name'] . "-File Ijazah Darat-" . $request->file_ijazah_darat->getClientOriginalName();
            $request->file('file_ijazah_darat')->move("profil/file_ijazah_darat/", $files);
            $requests['file_ijazah_darat'] = "file/file_ijazah_darat/" . $files;
        }

        if($request->hasFile('file_akte')) {
            $files =  $requests['name'] . "-File AKTE-" . $request->file_akte->getClientOriginalName();
            $request->file('file_akte')->move("profil/file_akte/", $files);
            $requests['file_akte'] = "file/file_akte/" . $files;
        }
        
        $cat = Profil::create($requests);
        if($cat){
            return redirect('admin/akun-profil')->with('status', 'Berhasil menambah data!');
        }

        return redirect('admin/akun-profil')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Profil::find($id);
        return view('admin.akun-profil.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = Profil::find($id);
        if ($d == null){
            return redirect('admin/akun-profil')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        if($request->hasFile('file_foto')) {
            if($d->file_foto !== null){
                File::delete("$d->file_foto");
            }
            $files = $requests['name'] . "-File KTP-" . $request->file_foto->getClientOriginalName();
            $request->file('file_foto')->move("profil/file_foto", $files);
            $req['file_foto'] = "file/profil/" . $files;
        }

        if($request->hasFile('file_ktp')) {
            if($d->file_ktp !== null){
                File::delete("$d->file_ktp");
            }
            $files = $requests['name'] . "-File KTP-" .  $request->file_ktp->getClientOriginalName();
            $request->file('file_ktp')->move("profil/file_ktp", $files);
            $req['file_ktp'] = "profil/file_ktp" . $files;
        }

        if($request->hasFile('file_ijazah_darat')) {
            if($d->file_ijazah_darat !== null){
                File::delete("$d->file_ijazah_darat");
            }
            $files = $requests['name'] . "-File Ijazah Darat-" .  $request->file_ijazah_darat->getClientOriginalName();
            $request->file('file_ijazah_darat')->move("profil/file_ijazah_darat", $files);
            $req['file_ijazah_darat'] = "profil/file_ijazah_darat" . $files;
        }

        if($request->hasFile('file_akte')) {
            if($d->file_akte !== null){
                File::delete("$d->file_akte");
            }
            $files = $requests['name'] . "-File AKTE-" .  $request->file_akte->getClientOriginalName();
            $request->file('file_akte')->move("profil/file_akte", $files);
            $req['file_akte'] = "profil/file_akte" . $files;
        }
        
        $data = Profil::find($id)->update($req);
        if($data){
            return redirect('admin/akun-profil')->with('status', 'Akun Profil Berhasil diedit !');
        }

        return redirect('admin/akun-profil')->with('status', 'Gagal edit data Akun Profil!');
        
    }

    public function delete($id)
    {
    $data = Profil::find($id);
    if ($data == null) {
        return redirect('admin/akun-profil')->with('status', 'Data tidak ditemukan !');
    }

    if ($data->file_foto !== null || $data->file_foto !== "") {
        file::delete("$data->file_foto");
    }

    if ($data->file_ktp !== null || $data->file_ktp !== "") {
        file::delete("$data->file_ktp");
    }

    if ($data->file_ijazah_darat !== null || $data->file_ijazah_darat !== "") {
        file::delete("$data->file_ijazah_darat");
    }

    if ($data->file_akte !== null || $data->file_akte !== "") {
        file::delete("$data->file_akte");
    }

    $delete = $data->delete();
    if ($delete) {
        return redirect('admin/akun-profil')->with('status', 'Berhasil hapus Akun Profil !');
    }
    return redirect('admin/akun-profil')->with('status', 'Gagal hapus Akun Profil !');
    }
}
