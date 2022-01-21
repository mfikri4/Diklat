<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Profil;

class AkunController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = Profil::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Akun',
            'data'    => $data  
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find profil by ID
        $data = Profil::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Profile',
            'data'    => $data 
        ], 200);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'username'              => 'required',
            'email'                 => 'required',
            'password'              => 'required',
            'nik'                   => 'required',
            'no_hp'                 => 'required',
            'name_ibu'              => 'required',
            'tempat'                => 'required',
            'tanggal_lahir'         => 'required',
            'jenis_kelamin'         => 'required',
            'pendidikan_terakhir'   => 'required',
            'kewarganegaraan'       => 'required',
            'provinsi'              => 'required',
            'kabupaten'             => 'required',
            'kecamatan'             => 'required',
            'kelurahan'             => 'required',
            'alamat'                => 'required',
            'rt'                    => 'required',
            'rw'                    => 'required',
            'kode_pos'              => 'required',
            'file_foto'             => 'required',
            'file_ktp'              => 'required',
            'file_ijazah_darat'     => 'required',
            'file_akte'             => 'required',
            'name_sekolah'          => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

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

        //save to database
        $data = Profil::create([
            'name'                  => $request->name,
            'username'              => $request->username,
            'email'                 => $request->email,
            'password'              => $request->password,
            'nik'                   => $request->nik,
            'no_hp'                 => $request->no_hp,
            'name_ibu'              => $request->name_ibu,
            'tempat'                => $request->tempat,
            'tanggal_lahir'         => $request->tanggal_lahir,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'kewarganegaraan'       => $request->kewarganegaraan,
            'provinsi'              => $request->provinsi,
            'kabupaten'             => $request->kabupaten,
            'kecamatan'             => $request->kecamatan,
            'kelurahan'             => $request->kelurahan,
            'alamat'                => $request->alamat,
            'rt'                    => $request->rt,
            'rw'                    => $request->rw,
            'kode_pos'              => $request->kode_pos,
            'file_foto'             => $request->file_foto,
            'file_ktp'              => $request->file_ktp,
            'file_ijazah_darat'     => $request->file_ijazah_darat,
            'file_akte'             => $request->file_akte,
            'name_sekolah'          => $request->name_sekolah
        ]);

        //success save to database
        if($data) {

            return response()->json([
                'success' => true,
                'message' => 'Data Created',
                'data'    => $data  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Data Failed to Save',
        ], 409);

    }

    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $akun
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'username'              => 'required',
            'email'                 => 'required',
            'password'              => 'required',
            'nik'                   => 'required',
            'no_hp'                 => 'required',
            'name_ibu'              => 'required',
            'tempat'                => 'required',
            'tanggal_lahir'         => 'required',
            'jenis_kelamin'         => 'required',
            'pendidikan_terakhir'   => 'required',
            'kewarganegaraan'       => 'required',
            'provinsi'              => 'required',
            'kabupaten'             => 'required',
            'kecamatan'             => 'required',
            'kelurahan'             => 'required',
            'alamat'                => 'required',
            'rt'                    => 'required',
            'rw'                    => 'required',
            'kode_pos'              => 'required',
            'file_foto'             => 'required',
            'file_ktp'              => 'required',
            'file_ijazah_darat'     => 'required',
            'file_akte'             => 'required',
            'name_sekolah'          => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

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

        //find akun by ID
        $data = Profil::findOrFail($id);

        if($data) {

            //update akun
            $data->update([
                'name'                  => $request->name,
                'username'              => $request->username,
                'email'                 => $request->email,
                'password'              => $request->password,
                'nik'                   => $request->nik,
                'no_hp'                 => $request->no_hp,
                'name_ibu'              => $request->name_ibu,
                'tempat'                => $request->tempat,
                'tanggal_lahir'         => $request->tanggal_lahir,
                'jenis_kelamin'         => $request->jenis_kelamin,
                'pendidikan_terakhir'   => $request->pendidikan_terakhir,
                'kewarganegaraan'       => $request->kewarganegaraan,
                'provinsi'              => $request->provinsi,
                'kabupaten'             => $request->kabupaten,
                'kecamatan'             => $request->kecamatan,
                'kelurahan'             => $request->kelurahan,
                'alamat'                => $request->alamat,
                'rt'                    => $request->rt,
                'rw'                    => $request->rw,
                'kode_pos'              => $request->kode_pos,
                'file_foto'             => $request->file_foto,
                'file_ktp'              => $request->file_ktp,
                'file_ijazah_darat'     => $request->file_ijazah_darat,
                'file_akte'             => $request->file_akte,
                'name_sekolah'          => $request->name_sekolah
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Akun Profile Updated',
                'data'    => $data  
            ], 200);

        }

        //data akun  not found
        return response()->json([
            'success' => false,
            'message' => 'Akun Not Found',
        ], 404);

    }


    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find Akun by ID
        $akun = Profil::findOrfail($id);

        if($akun) {

            //delete akun
            $akun->delete();

            return response()->json([
                'success' => true,
                'message' => 'Akun Deleted',
            ], 200);

        }

        //data Akun not found
        return response()->json([
            'success' => false,
            'message' => 'Akun Not Found',
        ], 404);
    }

}
