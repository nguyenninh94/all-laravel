<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pr;

class PrController extends Controller
{
    public function welcome() 
    {
    	return view('welcome');
    }
    
    public function index()
    {
    	$prs = Pr::all();
        return view('xxx.pr', compact('prs'));
    }

    public function store(Request $request)
    {
    	$rules = [
           'name'=> 'required|unique:name,prs',
           'details' => 'required',
    	];
    	$prs = Pr::create($request->all(), $rules);

    	return response()->json($prs);
    }

    public function show($id) 
    {
    	$prs = Pr::find($id);
    	return response()->json($prs);
    }

    public function update(Request $request, $id)
    {
        $prs = Pr::find($id);
        $rules = [
           'name' => 'required|unique:name,prs,id',
           'details' => 'required',
        ];
        $prs->update($request->all(), $rules);
        return response()->json('success');
    }

    public function destroy($id)
    {
    	$pr = Pr::find($id);
    	$pr->delete($id);
    	return response()->json('success');
    }

}
