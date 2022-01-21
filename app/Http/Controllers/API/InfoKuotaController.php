<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KuotaDiklat;

class InfoKuotaController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = KuotaDiklat::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Info Kuota Diklat',
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
        //find KuotaDiklat by ID
        $data = KuotaDiklat::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Info Kuota Diklat',
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
            'name'              => 'required',
            'periode'           => 'required',        
            'jadwal_diklat'     => 'required',
            'sisa_kuota'        => 'required',
            'status'            => 'required'
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $data = KuotaDiklat::create([
            'name'              => $request->name,
            'periode'           => $request->periode,
            'jadwal_diklat'     => $request->jadwal_diklat,
            'sisa_kuota'        => $request->sisa_kuota,
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
            'name'              => 'required',
            'periode'           => 'required',        
            'jadwal_diklat'     => 'required',
            'sisa_kuota'        => 'required',
            'status'            => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find Info Kuota by ID
        $kuota = KuotaDiklat::findOrFail($id);

        if($kuota) {

            //update Info Kuota
            $kuota->update([
                'name'              => $request->name,
                'periode'           => $request->periode,
                'jadwal_diklat'     => $request->jadwal_diklat,
                'sisa_kuota'        => $request->sisa_kuota,
                'status'            => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Info Kuota Diklat Updated',
                'data'    => $kuota  
            ], 200);

        }

        //data Info Kuota not found
        return response()->json([
            'success' => false,
            'message' => 'Info Kuota Diklat Not Found',
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
        //find Info Diklat by ID
        $kuota = KuotaDiklat::findOrfail($id);

        if($kuota) {

            //delete Info Diklat
            $kuota->delete();

            return response()->json([
                'success' => true,
                'message' => 'Info Kuota Diklat Deleted',
            ], 200);

        }

        //data Info Diklat not found
        return response()->json([
            'success' => false,
            'message' => 'Info Kuota Diklat Not Found',
        ], 404);
    }

   
}
