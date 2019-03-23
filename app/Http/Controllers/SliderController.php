<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function add_slider(){
    	return view('admin.add_slider');
    }
    public function save_slider(Request $req){
    	$data = array();
    	$data['publication_status'] = $req->publication_status;
    	if($req->hasFile('slider_image')){
    		if($req->file('slider_image')->isValid()){
    			$image = $req->file('slider_image');

    			if($image){
    				$image_name = str_random(20);
    				$ext = strtolower($image->getClientOriginalExtension());
    				$img_full_name = $image_name.'.'.$ext;
    				$uplode_path = 'slider/';
    				$img_url = $uplode_path.$img_full_name;
    				$success = $image->move($uplode_path,$img_full_name);
    				if($success){
    					$data['slider_image'] = $img_url;

    					DB::table('tbl_slider')->insert($data);
    					Session::put('message','Slider add Successfully');
    					return Redirect::to('/add_slider');
    				}
    			}else{
    				Session::put('message','Please Provide a Slider Image');
    				return Redirect::to('/add_slider');
    			}
    		}
    	}
    }

    public function all_slider(){
    	$slider_tbl_query = DB::table('tbl_slider')
    		->get();

    	$manage_slider = view('admin.all_slider')
    						->with('slider_tbl_all_data',$slider_tbl_query);
    	return view('admin_layout')
    			->with('admin.all_slider',$manage_slider);
    }
    public function unactice_slider($slider_id){
    	$unactice_slider = DB::table('tbl_slider')
    						->where('slider_id',$slider_id)
    						->update(['publication_status' => 0]);
    	if($unactice_slider){
    		Session::put('message','Slider Unactiice Successfully');
    		return Redirect::to('/all_slider');
    	}else{
    		Session::put('message','nouthing are change');
    		return Redirect::to('/all_slider');
    	}

    }

    public function actice_slider($slider_id){
    	$actice_slider = DB::table('tbl_slider')
    						->where('slider_id',$slider_id)
    						->update(['publication_status' => 1]);
    	if($actice_slider){
    		Session::put('message','Slider actiice Successfully');
    		return Redirect::to('/all_slider');
    	}else{
    		Session::put('message','nouthing are change');
    		return Redirect::to('/all_slider');
    	}

    }
    
    public function delete_slider($slider_id){
    	$delete_slider = DB::table('tbl_slider')
    						->where('slider_id',$slider_id)
    						->delete();
    	if($delete_slider){
    		Session::put('message','Slider delete Successfully');
    		return Redirect::to('/all_slider');
    	}else{
    		Session::put('message','nouthing are change');
    		return Redirect::to('/all_slider');
    	}

    }
}
