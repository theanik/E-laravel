<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function index(){
    	//echo "add cat";
    	return view('admin.add_cat');
    }

    public function all_category(){
    	$all_cat_table_query = DB::table('tbl_category')->get();
    	$manage_category = view('admin.all_category')
    						->with('cat_table_all_data',$all_cat_table_query);
    	return view('admin_layout')
    			->with('admin.all_category',$manage_category);

    	//return view('admin.all_category');
    }
    public function save_category(Request $req){
    	$data = array();
    	$data['cat_id'] = $req->cat_id;
    	$data['cat_name'] = $req->cat_name;
    	$data['cat_description'] = $req->cat_descrition;
    	$data['publicaton_status'] = $req->publication_status;
    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Data insert Successfully..');
    	return Redirect::to('/add_cat');
    }
    public function unactive($cat_id){
    	DB::table('tbl_category')
    		->where('cat_id',$cat_id)
    		->update(['publicaton_status' => 0]);
    		
    		Session::put('message','Category unactice Successfully');
    		return Redirect::to('/all_cat');
    	//echo $cat_id;
    }

    public function cat_actice($cat_id){
    	DB::table('tbl_category')
    		->where('cat_id',$cat_id)
    		->update(['publicaton_status' => 1]);
    		
    		Session::put('message','Category actice Successfully');
    		return Redirect::to('/all_cat');
    }

    public function edit_cat($cat_id){
    	//return view('admin.edit_cat');
    	$cat_tbl_query_by_cat_id = DB::table('tbl_category')
    		->where('cat_id',$cat_id)
    		->first(); //first() use for find one form db

    		$cat_info = view('admin.edit_cat')
    				->with('cat_data_by_cat_id',$cat_tbl_query_by_cat_id);

    		return view('admin_layout')
    				->with('admin.edit_cat',$cat_info);
    }

    public function update_category(Request $req,$cat_id){
    	//echo $cat_id;
    	$data = array();
    	$data['cat_name'] = $req->cat_name;
    	$data['cat_description'] = $req->cat_description;
    	DB::table('tbl_category')
    		->where('cat_id',$cat_id)
    		->update($data);

    		Session::put('message','Category Upadeted Successfully...');
    		return Redirect::to('/all_cat');
    }

    public function delete_cat($cat_id){
    	DB::table('tbl_category')
    		->where('cat_id',$cat_id)
    		->delete();
    		//Session::put('message','One Item Deleted');
    		return Redirect('/all_cat');
    }
}
