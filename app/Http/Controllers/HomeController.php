<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
    	//return view('pages.home_content');
    	//echo 10;
    	//return view('pages.home_content');
    	$all_product_table_query = DB::table('tbl_product')
    	->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
    	->join('brand','tbl_product.brand_id','=','brand.brand_id')
    	->select('tbl_product.*','tbl_category.cat_name','brand.brand_name')
    	->where('tbl_product.publication_status',1)
    	->limit(9)
    	->get();
    	$manage_product = view('pages.home_content')
    						->with('all_published_product',$all_product_table_query);
    	return view('layout')
    			->with('pages.home_content',$manage_product);
    }

    public function product_by_cat($cat_id){
        $query_product_tbl_by_cat = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
        ->join('brand','tbl_product.brand_id','=','brand.brand_id')
        ->select('tbl_product.*','tbl_category.cat_name','brand.brand_name')
        ->where('tbl_product.cat_id',$cat_id)
        ->where('tbl_product.publication_status',1)
        ->limit(18)
        ->get();
        $cat_tbl = DB::table('tbl_category')
                    ->where('cat_id',$cat_id)
                    ->first();
        $manage = view('pages.product_by_cat')
                    ->with('all_product_by_cat',$query_product_tbl_by_cat)
                    ->with('cat_details',$cat_tbl);

        return view('layout')
                ->with('pages.product_by_cat',$manage);
        }

    public function product_by_brand($brand_id){
        $product_tbl = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
        ->join('brand','tbl_product.brand_id','=','brand.brand_id')
        ->select('tbl_product.*','tbl_category.cat_name','brand.brand_name')
         ->where('tbl_product.brand_id',$brand_id)
        ->where('tbl_product.publication_status',1)
        ->limit(9)
        ->get();
        $brand_tbl = DB::table('brand')
                    ->where('brand_id',$brand_id)
                    ->first();

        $manage = view('pages.product_by_brand')
                            ->with('all_product_by_brand',$product_tbl)
                            ->with('brand_details',$brand_tbl);
        return view('layout')
                ->with('pages.product_by_brand',$manage);

    }

    public function product_details_by_id($product_id){
        $all_product_table_query = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.cat_id','=','tbl_category.cat_id')
        ->join('brand','tbl_product.brand_id','=','brand.brand_id')
        ->select('tbl_product.*','tbl_category.cat_name','brand.brand_name')
        ->where('tbl_product.product_id',$product_id)
        ->first();
        $manage_product = view('pages.product_details')
                            ->with('all_prodcut_data_by_id',$all_product_table_query);
        return view('layout')
                ->with('pages.product_details',$manage_product);
    }




}
