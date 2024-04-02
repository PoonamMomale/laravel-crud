<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(){
        $url = url('/home');
        return view('home',compact('url'));
    }

    public function view(){
        $customers = Customer::all();
        return view('customer',compact('customers'));
    }

    public function store(request $req){
        // $req->validate([
        //     'name' => 'required',
        //     'email' => 'required | email',
        //     'password' => 'required',
        // ]);
        // echo "<pre>";
        // print_r($req->all());

        $customer = new Customer;
        $customer->name = $req['name'];
        $customer->email = $req['email'];
        $customer->password = $req['password'];
        $customer->address = $req['address'];
        $customer->save();
        return redirect('/customer');
    }

    public function delete($id){
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer');
    }

    public function edit($id){
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $url = url('/customer/update')."/".$id;
            $data = compact('customer','url');
            return view('home')->with('url');
        }
        else{
            return redirect('/customer');
        }
    }

    public function update($id){
        $customer = Customer::find($id);
        $customer->name = $req['name'];
        $customer->email = $req['email'];
        $customer->password = $req['password'];
        $customer->address = $req['address'];
        $customer->save();
        return redirect('/customer');
    }
}
