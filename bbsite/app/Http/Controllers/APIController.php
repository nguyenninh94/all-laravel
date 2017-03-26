<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provice;
use App\Location;
use App\Tag;
use App\Comment;
use DB;
use App;

class APIController extends Controller
{
    public function index()
    {
    	$provinces = [];
        foreach(Provice::all() as $province) {
        	$provinces[$province->id] = $province->name;
        }
        //dd($provinces);
        /*foreach($provinces as $province) {
        	$dis = DB::table('districts')->where('province_id', $province->id)->get();
        	dd($dis);
        }*/
        return view('index', compact('provinces'));
    }

    public function getDistrict($id)
    { 
       	$district = DB::table('districts')
                     ->select('id', 'name')
                     ->where('province_id', $id)
                     ->get();
        return response()->json($district);             
    }

    public function getWard($id)
    {
    	$ward = DB::table('wards')
    	         ->select('id', 'name')
    	         ->where('district_id', $id)
    	         ->get();
    	return response()->json($ward);         
    }

    public function map()
    {
        $location = Location::all();
        return view('xxx.gmap', compact('location'));
    }

    public function changeLanguage(Request $request)
    {
        if($request->ajax()) {
            $request->session()->put('locale', $request->locale);
        }
    }

    public function tag()
    {
        return view('xxx.tags');
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if(empty($term)) {
            return response()->json([]);
        }

        $tags = Tag::search($term)->limit(5)->get();

        $list_tag = [];
        foreach($tags as $tag) {
            $list_tag[] = ['id' => $tag->id, 'name' => '$tag->name'];
        }

        return response()->json($list_tag);
    }

    public function comment(Request $request)
    { /*
        $c = Comment::all()->toArray();
        //$comment = array_pop($d);  //lay phan tu cuoi
        $comment = array_shift($c); //lay phan tu dau
        dd($comment);*/
        //$comments = Comment::take((Comment::count()) - 1)->orderBy('id', 'DESC')->get();//loai phan tu cuoi
        //dd($comment);
        $comments = Comment::where(function($query) use($request) {
            if(($search = $request->get('search'))) {
                $query->where('author_name', 'like', '%' . $search . '%');
              } else {
                $query->whereNotNull('author_name');
              }
        })
        ->paginate(10);

        return view('xxx.comment', compact('comments'));
    } 

    public function autoSearch(Request $request)
    {
        if($request->ajax()) {
            $comments = Comment::where(function($query) use($request) {
              if(($search = $request->get('search'))) {
                $query->where('author_name', 'like', '%' . $search . '%');
              }
            })
            ->orderBy('id', 'DESC')->take('10')->get();
                $array = [];
                foreach($comments as $v) {
                    $array[] = array('value' => $v->author_name);
                }     

            return response()->json($array);
        }
    }

    public function autosearchmap()
    {
        return view('xxx.mapapiautosearch');
    }

}
