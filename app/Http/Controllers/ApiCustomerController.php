<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerStore;
use Illuminate\Support\Facades\Validator;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CustomerStore::with('address')->orderBy('name','asc')->get();
        if(!empty($data)){
            return response()->json([
                'status' => 'true',
                'message' => 'Result found!',
                'result' => $data
            ],200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCustomer = new CustomerStore;

        $rules = [
            'title' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => 'false',
                'message' => 'Cant create data!',
                'result' => $validator->errors()
            ],400);
        }

        $dataCustomer->title = $request->title;
        $dataCustomer->name = $request->name;
        $dataCustomer->gender = $request->gender;
        $dataCustomer->phone_number = $request->phone_number;
        $dataCustomer->image = $request->image;
        $dataCustomer->email = $request->email;
        $dataCustomer->save();

        return response()->json([
            'status' => true,
            'message' => 'Data created successfully'
        ],201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = CustomerStore::with('address')->find($id);
        if(!empty($data)){
            return response()->json([
                'status' => 'true',
                'message' => 'Result found!',
                'result' => $data
            ],200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataCustomer = CustomerStore::find($id);
        if(empty($dataCustomer)){
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }
        $rules = [
            'title' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => 'false',
                'message' => 'Cant update data!',
                'result' => $validator->errors()
            ],400);
        }

        $dataCustomer->title = $request->title;
        $dataCustomer->name = $request->name;
        $dataCustomer->gender = $request->gender;
        $dataCustomer->phone_number = $request->phone_number;
        $dataCustomer->image = $request->image;
        $dataCustomer->email = $request->email;
        $dataCustomer->save();

        return response()->json([
            'status' => true,
            'message' => 'Data updated successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCustomer = CustomerStore::find($id);
        if(empty($dataCustomer)){
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }

        $dataCustomer->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data deleted successfully'
        ],200);
    }
}
