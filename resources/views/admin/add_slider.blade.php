@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Forms</a>
	</li>
	</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/save_slider') }}" method="post" enctype= "multipart/form-data" >
				{{ csrf_field() }}
			  <fieldset>
				
				<div class="control-group">
				  <label class="control-label" for="typeahead">Slider Image</label>
				  <div class="controls">
					<input type="file" name="slider_image" required="1">
					
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="fileInput">Publisher Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" value="1" required="">
				  </div>
				</div>  
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Slider</button>
				  <button type="reset" class="btn">Cancel</button>
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
				</div>
				
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->



@endsection('admin_content')