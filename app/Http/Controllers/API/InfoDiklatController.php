<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JenisDiklat;

class InfoDiklatController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = JenisDiklat::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Diklat',
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
        //find JenisDiklat by ID
        $data = JenisDiklat::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Jenis Diklat',
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
            'title'             => 'required',
            'content'           => 'required',
            'status'            => 'required'
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $data = JenisDiklat::create([
            'title'             => $request->title,
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
            'title'             => 'required',
            'content'           => 'required',
            'status'            => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $post = JenisDiklat::findOrFail($id);

        if($post) {

            //update post
            $post->update([
                'title'             => $request->title,
                'content'           => $request->content,
                'status'            => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $post  
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
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
        $post = JenisDiklat::findOrfail($id);

        if($post) {

            //delete Info Diklat
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Info Diklat Deleted',
            ], 200);

        }

        //data Info Diklat not found
        return response()->json([
            'success' => false,
            'message' => 'Info Diklat Not Found',
        ], 404);
    }

   
}
