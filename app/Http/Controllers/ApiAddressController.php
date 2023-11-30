<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressStore;
use Illuminate\Support\Facades\Validator;

class ApiAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataAddress = new AddressStore;

        $rules = [
            'customer_id' => 'required',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => 'false',
                'message' => 'Cant create data!',
                'result' => $validator->errors()
            ],400);
        }

        $dataAddress->customer_id = $request->customer_id;
        $dataAddress->address = $request->address;
        $dataAddress->district = $request->district;
        $dataAddress->city = $request->city;
        $dataAddress->province = $request->province;
        $dataAddress->postal_code = $request->postal_code;
        $dataAddress->save();

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
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataAddress = AddressStore::find($id);
        if(empty($dataAddress)){
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }
        $rules = [
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => 'false',
                'message' => 'Cant update data!',
                'result' => $validator->errors()
            ],400);
        }

        $dataAddress->address = $request->address;
        $dataAddress->district = $request->district;
        $dataAddress->city = $request->city;
        $dataAddress->province = $request->province;
        $dataAddress->postal_code = $request->postal_code;
        $dataAddress->save();

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
        $dataAddress = AddressStore::find($id);
        if(empty($dataAddress)){
            return response()->json([
                'status' => 'false',
                'message' => 'Result not found!'
            ],404);
        }

        $dataAddress->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data deleted successfully'
        ],200);
    }
}
