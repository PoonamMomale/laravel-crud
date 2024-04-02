<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        if(count($customers) > 0){
            $response = [
                'message'=> count($customers). ' customers found',
                'status'=> 1,
                'data' => $customers,
            ];
        }
        else{
            $response = [
                'message' => count($customers).' found',
                'status' => 0,
            ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>['required'],
            'email'=>['email','required','unique:customers,email'],
            // 'address'=>['required','min:3']
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            DB::beginTransaction();
            try{
                Customer::create($data);
                DB::commit();
                p($request->all());
            }
            catch(\Exception $e){
                DB::rollBack(); 
                $customer = null;
            }
            if($customer != null){
                return response()->json([
                    'message'=>'user registered successfully',
                ],200);
            }
            else{
                return response()->json([
                    'message'=>'internal server error'
                ],500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $response = [
                'message'=>'user found',
                'status'=>1,
                'data'=>$customer,
            ];
        }else{
            $response = [
                'message'=>'user not found',
                'status'=>0,
            ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            DB::beginTransaction();
            try{
                $customer->name = $request['name'];
                $customer->email = $request['email'];
                $customer->password = $request['password'];
                $customer->status = $request['status'];
                $customer->address = $request['address'];
                $customer->save();
                DB::commit();
            }
            catch(\Exception $e){
                DB::rollBack();
                $customer=null;
            }

            if(is_null($customer)){
            $response=[
                'message'=>'internal server error',
                'status'=>0,
                'error'=>$e->getMessage(),
            ];
            $respCode=500;
            }
            else{
            $response=[
                'message'=>'customer updated',
                'status'=>1,
                'data'=>$customer,
            ];
            $respCode=200;
            }
        }
        else{
            $response = [
                'message'=>'customer not found',
                'status'=>0.
            ];
            $respCode = 404;
        }
        
        return response()->json($response, $respCode);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            DB::beginTransaction();
            try{
                $customer->delete();
                DB::commit();
                $response=[
                    'message'=>'customer deleted',
                    'status'=>1,
                ];
                $respCode=200;
            }
            catch(\Exception $e){
                $response=[
                    'message'=>'internal server error',
                    'status'=>0,
                ];
                $respCode=500;
            }
        }
        else{
            $response = [
                'message'=>'customer not found',
                'status'=>0,
            ];
            $respCode = 404;
        }
        return response()->json($response, $respCode);
    }
}
