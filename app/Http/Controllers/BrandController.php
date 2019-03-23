<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
	public function add_brand(){
    	return view('admin.add_brand');
	}
	public function save_brand(Request $req){
		$data = array();
		$data['brand_id'] = $req->brand_id;
		$data['brand_name'] = $req->brand_name;
		$data['brand_description'] = $req->brand_descrition;
		$data['publication_status'] = $req->publication_status;

		$insert = DB::table('brand')->insert($data);
		if($insert){
			Session::put('message','Brand add successfully');
			return Redirect('/add_brand');
		}else{
			Session::put('message','Data not add');
		}
	}
	public function all_brand(){
	//return view('admin.all_brand');
		$all_brand_tbl_query = DB::table('brand')->get();
		$manage_brand = view('admin.all_brand')
						->with('brand_tbl_all_data',$all_brand_tbl_query);
		return view('admin_layout')
					->with('admin.all_brand',$manage_brand);
	}
	public function unactive_brand($brand_id){
		$unactive_brand = DB::table('brand')
						->where('brand_id',$brand_id)
						->update(['publication_status' => 0]);
		if($unactive_brand){
			Session::put('message','Brand Unactice successfully');
			return Redirect::to('/all_brand');
		}else{
			Session::put('message','Nothing are change');
		}

	}
	public function active_brand($brand_id){
		$active_brand = DB::table('brand')
						->where('brand_id',$brand_id)
						->update(['publication_status' => 1]);
		if($active_brand){
			Session::put('message','Brand actice successfully');
			return Redirect::to('/all_brand');
		}else{
			Session::put('message','Nothing are change');
		}

	}
	public function delete_brand($brand_id){
		$delete_brand = DB::table('brand')
						->where('brand_id',$brand_id)
						->delete();
		if($delete_brand){
			Session::put('message','Brand delele successfully');
			return Redirect::to('/all_brand');
		}else{
			Session::put('message','Nothing are change');
		}

	}
}