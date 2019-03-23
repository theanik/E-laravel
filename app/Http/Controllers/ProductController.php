<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function add_product(){
    	$this->AdminAuth();
    	return view('admin.add_product');
    }
    public function save_product(Request $req){
    	$data = array();
    	$data['product_id'] = $req->product_id;
    	$data['cat_id'] = $req->cat_id;
    	$data['brand_id'] = $req->brand_id;
    	$data['product_name'] = $req->product_name;
    	$data['product_short_description'] = $req->product_short_descrition;
    	$data['product_long_description'] = $req->product_long_descrition;
    	$data['product_price'] = $req->product_price;
    	//$data['product_image'] = $req->product_image;
    	$data['product_size'] = $req->product_size;
    	$data['product_color'] = $req->product_color;
    	$data['publication_status'] = $req->publication_status;

    	if($req->hasFile('product_image')){
    		if($req->file('product_image')->isValid()){
    			$image = $req->file('product_image');
    			if($image){
    				$image_name = str_random(20);
    				$ext = strtolower($image->getClientOriginalExtension());
    				$full_img_name = $image_name.'.'.$ext;
    				$uplode_path = 'image/';
    				$img_url = $uplode_path.$full_img_name;
    				$success = $image->move($uplode_path,$full_img_name);
    				if($success){
    					$data['product_image'] = $img_url;

    					DB::table('tbl_product')->insert($data);
    					Session::put('message','Product add Successfully');
    					return Redirect::to('/add_product');
    				}
    			}
    			$data['product_image'] = '';
    			DB::table('tbl_product')->insert($data);
    			Session::put('message','Product add Successfully With Image');
    			return Redirect::to('/add_product');
    		}
    	}
    					
    }
    public function all_product(){
    	$this->AdminAuth();
    	$all_product_table_query = DB::table('tbl_product')
    	->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
    	->join('brand','tbl_product.brand_id','=','brand.brand_id')
    	->select('tbl_product.*','tbl_category.cat_name','brand.brand_name')
    	->get();
    	$manage_product = view('admin.all_product')
    						->with('product_table_all_data',$all_product_table_query);
    	return view('admin_layout')
    			->with('admin.all_product',$manage_product);
    }

    public function unactive_product($product_id){
    	//echo $product_id;
    	$this->AdminAuth();
    	$unactive_product = DB::table('tbl_product')
    						->where('product_id',$product_id)
    						->update(['publication_status' => 0]);

    	if($unactive_product){
    		Session::put('message','Product Unactice sunccessfuly');
    		return Redirect('/all_product');
    	}else{
    		Session::put('message','Nothing are change');
    		return Redirect('/all_product');
    	}
    }

    public function active_product($product_id){
    	$this->AdminAuth();
    	$active_product = DB::table('tbl_product')
    						->where('product_id',$product_id)
    						->update(['publication_status' => 1]);

    	if($active_product){
    		Session::put('message','Product actice sunccessfuly');
    		return Redirect('/all_product');
    	}else{
    		Session::put('message','Nothing are change');
    		return Redirect('/all_product');
    	}
    }

    public function delete_product($product_id){
    	$this->AdminAuth();
    	$delete_product = DB::table('tbl_product')
    					->where('product_id',$product_id)
    					->delete();
    	if($delete_product){
    		Session::put('message','Product delete sunccessfuly');
    		return Redirect('/all_product');
    	}else{
    		Session::put('message','Nothing are change');
    		return Redirect('/all_product');
    	}
    }

    public function edit_product($product_id){
    	$this->AdminAuth();
    	$product_tbl_query_by_id = DB::table('tbl_product')
    								->where('product_id',$product_id)
    								->first();
    	
    }

    public function AdminAuth(){
		$loginfo = Session::get('adminLoginfo');
		if($loginfo === true){
			return;
		}else{
			return Redirect::to('/admin')->send();
		}
	}
}
