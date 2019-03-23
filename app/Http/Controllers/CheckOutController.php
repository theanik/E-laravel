<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckOutController extends Controller
{
    public function checklogin(){
        return view('pages.login');
    	}

    public function customar_signup(Request $req){
    	$data = array();	
    	$data['email'] = $req->email;
    	$data['name'] = $req->name;
    	$data['password'] = $req->password;
    	$data['phone'] = $req->phone;

    	$id=DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_id',$id);
    	Session::put('customer_name',$req->name);
    	Session::put('customer_email',$req->email);

    	return Redirect::to('/checkout');
    }

    public function checkout(){
    	return view('pages.checkout');
    }

    public function login(Request $r){
    	$email = $r->email;
    	$password = $r->password;

    	$login = DB::table('tbl_customer')
    			->where('email',$email)
    			->where('password',$password)
    			->first();

    	if($login){
    		Session::put('customer_id',$login->id);
    		Session::put('customer_email',$login->email);
    		return Redirect::to('/checklogin');
    	}else{
    		Session::put('message','Your email or password are not matching');
    		return Redirect::to('/checklogin');
    	}
    }

    public function save_shiping_data(Request $rr){
    	$data = array();
    	$loc = $rr->post_code.','.$rr->country.','.$rr->state;
    	$data['shiping_email'] = $rr->email;
    	$data['shiping_f_name'] = $rr->f_name;
    	$data['shiping_l_name'] = $rr->l_name;
    	$data['shiping_address'] = $rr->address;
    	$data['shiping_location'] = $loc;
    	$data['shiping_phone'] = $rr->phone;

    	$shiping_id = DB::table('tbl_shifing')->insertGetId($data);

    	Session::put('shiping_id',$shiping_id);
    	return Redirect::to('/payment');
    }

    public function logout(){
    	Session::flush();
    	Cart::destroy();
    	return Redirect::to('/');
    }
    public function payment(){
    	return view('pages.payment');
    }

    public function order_place(Request $re){
    	$payment_method = $re->payment_method;
    	$pay_data = array();
    	$pay_data['payment_method'] = $payment_method;
    	$pay_data['payment_status'] = 'pending';

    	$payment_id = DB::table('payment')->insertGetId($pay_data);

    	$shiping_id = Session::get('shiping_id');
    	$customer_id = Session::get('customer_id');

    	$o_data = array();
    	$o_data['customer_id']=$customer_id;
    	$o_data['shiping_id'] = $shiping_id;
    	$o_data['payment_id'] = $payment_id;
    	$o_data['order_total'] = Cart::total();
    	$o_data['order_status'] = 'pending';

    	 $order_id = DB::table('order')->insertGetId($o_data);

    	 $contents = Cart::content();
    	 $od_data = array();

    	 foreach ($contents as $all_cart_data) {
    	 					
    	 	$od_data['order_id'] = $order_id;
    	 	$od_data['product_id'] = $all_cart_data->id;
    	 	$od_data['product_name'] = $all_cart_data->name;
    	 	$od_data['product_price'] = $all_cart_data->price;
    	 	$od_data['product_sale_qty'] = $all_cart_data->qty;

    	 	DB::table('order_details')->insert($od_data);
    	 }





	if($payment_method == 'paypal'){
		echo "paypal";
	}
	if($payment_method == 'master-card'){
		echo "master-card";
	}
	if($payment_method == 'bkash'){
		echo "bkash";
	}
	if($payment_method == 'ssl'){
		echo "ssl";
	}
	if($payment_method == 'hand_cash'){
		echo "hand_cash";
	}

    	// echo $payment_method;
    	// echo $shiping_id;
    	// $cart_content = Cart::content();
    	//echo $cart_content;
	  Cart::destroy();
    }


}
