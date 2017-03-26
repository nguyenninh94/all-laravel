<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Comment;
use Excel;
use PDF;

class ExcelPDFController extends Controller
{

	public function getIndex() {
		return view('xxx.exel');
	}
    public function downloadExel($type) {
        $data = Tag::get()->toArray();
        
        return Excel::create('tags', function($excel) use ($data) {
        	$excel->sheet('mySheet', function($sheet) use ($data) {
        		$sheet->fromArray($data);
        	});
        })->export($type);
    }

    public function importExcel(Request $request)
    {
    	if($request->hasFile('import_file')) {
    		$path = $request->file('import_file')->getRealPath();

    		$data = Excel::load($path, function($reader) {})->get();
    		if(!empty($data) && $data->count()) {
    			foreach($data as $key=>$value) {
    				$insert[] = ['name' => $value->name];
    			}

    			if(!empty($insert)) {
    				Tag::insert($insert);
    				return back()->with('success', 'Insert Record Successfully');
    			}
    		}
    	}
    	return back()->with('warning', 'Please check your file.Something is wrong there!');
    }

    public function downloadPDF()
    {
    	$comments = Comment::all();
    	$pdf = PDF::loadView('xxx.commentspdf', compact('comments'));
    	return $pdf->download('comments.pdf');
    }
}
