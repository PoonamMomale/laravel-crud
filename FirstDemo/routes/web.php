<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home/{name?}',function($name=null){
//     $data = compact('name');
//     return view('home')->with($data);
// });


// Route::get('/home',[DemoController::class, 'index']);
// Route::post('/home',[DemoController::class, 'store']);

// // Route::get('/customers',function(){
// //     $customers = Customer::all();
// //     echo "<pre>".$customers."</pre>";
// // });

// Route::get('/customer',[DemoController::class, 'view'])->name('customer');
// Route::get('/customer/delete/{id}',[DemoController::class, 'delete'])->name('customer.delete');
// Route::get('/customer/edit/{id}',[DemoController::class, 'edit'])->name('customer.edit');
// Route::post('/customer/update/{id}',[DemoController::class, 'update'])->name('customer.update');