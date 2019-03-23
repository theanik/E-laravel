@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<style>
				.cart_sec{
					width: 100%;
					float: left;


				}
				.cart_sec td{
					width: 15%;
					float: left;
					font-size: 14px;
				}
			</style>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu cart_sec">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							
						</tr>
					</thead>
					<tbody>
						<?php

							$contents = Cart::content();
							//echo "<pre>";
							//print_r($contents);
							//echo "</pre>";
							foreach($contents as $all_cart_data){
						?>
						
						<tr class="cart_sec">
							<td class="cart_product">
								<a href=""><img src="{{ URL::to($all_cart_data->options->image) }}" alt="" style="height: 80px;width: 90px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $all_cart_data->name }}</a></h4>
								<p>aa</p>
							</td>
							<td class="cart_price">
								<p>{{ $all_cart_data->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form method="post" action="{{ url('/update_cart') }}">
										{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="qty" value="{{ $all_cart_data->qty }}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{ $all_cart_data->rowId }}">
									<input type="submit" name="update" value="Update" class="btn btn-sm btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $all_cart_data->total }}</p>
							</td>
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL::to('/delete_cart_item_by_id/'.$all_cart_data->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php
								}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				{{-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> --}}
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
							<li>Eco Tax <span>{{ Cart::tax() }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{ Cart::total() }}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php
								$customer_id = Session::get('customer_id');
								if($customer_id){
									?>
									<a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Check Out</a>
									<?php

								}else{
									?>
									<a class="btn btn-default check_out" href="{{ URL::to('/checklogin') }}">Check Out</a>
									<?php
								}
							?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection('content')