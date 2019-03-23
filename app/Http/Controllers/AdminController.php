<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    //
    public function index(){
    	return view('admin_login');
    }

    public function dashbord(Request $req){
    	//echo "okk";
    	$admin_email = $req->admin_email;
    	$admin_password = $req->admin_password;

    	$result = DB::table('tbl_admin')
    					->where('admin_email',$admin_email)
    					->where('admin_password',$admin_password)
    					->first();
    					// echo "<pre>";
    					// print_r($result);
    					// exit();

    					if($result){
    						Session::put('admin_name',$result->admin_name);
    						Session::put('admin_id',$result->admin_id);
                            Session::put('adminLoginfo',true);
    						return Redirect::to('/dashbord');
    					}else{
    						Session::put('message','Your Email or password are invalid');
    						return Redirect::to('/admin');
    					}
    }


}
