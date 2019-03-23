@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="#">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<?php
	$message = Session::get('message');
	if($message){
		?>
		<script type="text/javascript">
			var message = "<?php echo $message?>";
			alert(message);
		</script>
		<?php
		//echo $message;
		Session::put('message',null);
	}
?>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Product ID</th>
					  <th>Product Name</th>
					  <th>Prouct Cateogry</th>
					  <th>Prouct Brand</th>
					  <th>Prouct Image</th>
					  <th>Prouct Price</th>
					  <th>Actions</th>
					  <th>Status</th>
				  </tr>
			  </thead>
			  <tbody>
			  @foreach($product_table_all_data as $all_product_data)   
			  
				<tr>
					<td>{{ $all_product_data->product_id }}</td>
					<td class="center">{{ $all_product_data->product_name }}</td>
					<td class="center">{{ $all_product_data->cat_name }}</td>
					<td class="center">{{ $all_product_data->brand_name }}</td>
					<td class="center"><img src="{{ URL::to($all_product_data->product_image)}}" style="height: 80px;width: 80px;"/></td>
					<td class="center">{{ $all_product_data->product_price }}</td>
					<td class="center">
						@if($all_product_data->publication_status == 1)
						<span class="label label-success">Active</span>
						@else
						<span class="alert-danger">Unactive</span>
						@endif
					</td>
					<td class="center">
					@if($all_product_data->publication_status == 1)
						<a class="btn btn-danger" href="{{ URL::to('/unactive_product/'.$all_product_data->product_id) }}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{ URL::to('/active_product/'.$all_product_data->product_id) }}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						<a class="btn btn-info" href="{{ URL::to('/edit_product/'.$all_product_data->product_id) }}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" id="delete" href="{{ URL::to('/delete_product/'.$all_product_data->product_id) }}">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				
			  
			  @endforeach
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->



@endsection('admin_content')Product