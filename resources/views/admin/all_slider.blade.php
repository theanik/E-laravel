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
					  <th>Slider ID</th>
					  <th>Slider Image</th>
					  <th>Actions</th>
					  <th>Status</th>
				  </tr>
			  </thead>
			  <tbody>
			  @foreach($slider_tbl_all_data as $all_slider_data)   
			  
				<tr>
					<td>{{ $all_slider_data->slider_id }}</td>
					<td class="center"><img src="{{ URL::to($all_slider_data->slider_image)}}" style="height: 100px;width: 300px;"/></td>
					
					<td class="center">
						@if($all_slider_data->publication_status == 1)
						<span class="label label-success">Active</span>
						@else
						<span class="alert-danger">Unactive</span>
						@endif
					</td>
					<td class="center">
						@if($all_slider_data->publication_status == 1)
						<a class="btn btn-danger" href="{{ URL::to('/unactice_slider/'.$all_slider_data->slider_id) }}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{ URL::to('/actice_slider/'.$all_slider_data->slider_id) }}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						
						<a class="btn btn-danger" id="delete" href="{{ URL::to('/delete_slider/'.$all_slider_data->slider_id) }}">
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



@endsection('admin_content')