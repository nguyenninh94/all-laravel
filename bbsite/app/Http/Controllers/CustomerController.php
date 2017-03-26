<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = Customer::orderBy('id', 'DESC')->paginate(5);
       $response = [
          'pagination' => [
             'total' => $customers->total(),
             'per_page' => $customers->perPage(),
             'current_page' => $customers->currentPage(),
             'last_page' => $customers->lastPage(),
             'from' => $customers->firstItem(),
             'to' => $customers->lastItem(),
           ],
           'data' => $customers,
       ];

       return response()->json($customers);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
          'name' => 'required|unique:customers,name',
          'email' => 'required|email|unique:customers,email',
          'password' => 'required|min:8|confirmed'
    	]);

    	$customers = Customer::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
    	]);

    	return response()->json($customers);
    }

    public function edit($id)
    {
    	$customers = Customer::find($id);
    	return response()->json($customers);
    }

    public function update(Request $request, $id)
    {
    	$customer = Customer::find($id);

    	if(!empty($request->password)) {
    		$this->validate($request, [
               'password' => 'min:8|confirmed'
    		]);

    		$customers = $customer->update([
               'password' => bcrypt($request->password),
    		]);
    	}

    	$this->validate($request, [
            'name' => 'required|unique:customers,name,id',
            'email' => 'required|email|unique:customers,email,id',
    	]);
    	$customers = $customer->update([
            'name' => $request->name,
            'email' => $request->email,
    	]);

    	return response()->json($customers);
    }

    public function destroy($id)
    {
    	$customers = Customer::find($id);
    	$customer->delete($id);

    	return respnse()->json('Success');
    }
}
