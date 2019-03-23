<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

	public function index(){
		$this->AdminAuth();
		return view('admin.dashbord');
	}
	public function AdminAuth(){
		$loginfo = Session::get('adminLoginfo');
		if($loginfo === true){
			return;
		}else{
			return Redirect::to('/admin')->send();
		}
	}
    public function logout(){
    	// Session::put('admin_name',null);
    	// Session::put('admin_id',null);

    	Session::flush();
    	return Redirect::to('/admin');
    }
}
