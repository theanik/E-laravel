<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CartController extends Controller
{
    public function add_cart(Request $req){
    	$product_quantity = $req->quantity;
    	$product_id = $req->product_id;
    	$product_info = DB::table('tbl_product')
    					->where('product_id',$product_id)
    					->first();

    	//$data = array();
    	$data['id'] = $product_info->product_id;
    	$data['name'] = $product_info->product_name;
    	$data['qty'] = $product_quantity;
    	$data['price'] = $product_info->product_price;
    	$data['options']['image'] = $product_info->product_image;

    	Cart::add($data);
    	return Redirect::to('/show_cart');
    }
    public function show_cart(){
    	$all_published_cat = DB::table('tbl_category')
    						->where('publicaton_status',1)
    						->get();

    	$manage = view('pages.add_cart')
    				->with('all_published_cat',$all_published_cat);

    	return view('layout')->with('pages.add_cart',$manage);
    }

    public function delete_cart_item_by_id($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show_cart');
    }

    public function update_cart(Request $req){
    	$qty = $req->qty;
    	$rowId = $req->rowId;
    	Cart::update($rowId,$qty);
    	return Redirect::to('/show_cart');
    }
}
