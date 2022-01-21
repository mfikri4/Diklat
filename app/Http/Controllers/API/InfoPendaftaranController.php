<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\InfoPendaftaran;

class InfoPendaftaranController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = InfoPendaftaran::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Info Pendaftaran Diklat',
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
        //find InfoPendaftaran by ID
        $data = InfoPendaftaran::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Info Pendaftaran Diklat',
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
            'title'        => 'required',
            'file'         => 'required',
            'content'      => 'required',
            'status'       => 'required'
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $requests['file'] = "";
        if($request->hasFile('file')) {
            
            $files = $requests['title'] . "-File-" . $request->file->getClientOriginalName();
            $request->file('file')->move("profil/info-pendaftaran/", $files);
            $requests['file'] = "profil/info-pendaftaran/" . $files;
        }
        
        //save to database
        $data = InfoPendaftaran::create([
            'title'             => $request->title,
            'file'              => $request->file,
            'content'           => $request->content,
            'status'            => $request->status
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
     * @param  mixed $data
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'file'         => 'required',
            'content'      => 'required',
            'status'       => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        if($request->hasFile('file')) {
            if($d->file !== null){
                File::delete("$d->file");
            }
            $files = $requests['title'] . "-File-" . $request->file->getClientOriginalName();
            $request->file('file')->move("profil/info-pendaftaran/", $files);
            $req['file'] = "profil/info-pendaftaran/" . $files;
        }
        
        //find Info Pendaftaran by ID
        $info = InfoPendaftaran::findOrFail($id);

        if($info) {

            //update Info Info
            $info->update([
                'title'             => $request->title,
                'file'              => $request->file,
                'content'           => $request->content,
                'status'            => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Info Pendaftaran Diklat Updated',
                'data'    => $info  
            ], 200);

        }

        //data Info Pendaftaran not found
        return response()->json([
            'success' => false,
            'message' => 'Info Pendaftaran Diklat Not Found',
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
        //find Info Pendaftaran Diklat by ID
        $info = InfoPendaftaran::findOrfail($id);

        if($info) {

            //delete Info Pendaftaran Diklat
            $info->delete();

            return response()->json([
                'success' => true,
                'message' => 'Info Pendaftaran Diklat Deleted',
            ], 200);

        }

        //data Info Diklat not found
        return response()->json([
            'success' => false,
            'message' => 'Info Pendaftaran Diklat Not Found',
        ], 404);
    }

  
}

