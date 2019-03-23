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
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/save_category') }}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name</label>
				  <div class="controls">
					<input type="text" name="cat_name" required="1">
					
				  </div>
				</div>
				        
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Categoy Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="cat_descrition"></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="fileInput">Publisher Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" value="1">
				  </div>
				</div>  
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Category</button>
				  <button type="reset" class="btn">Cancel</button>
				  <p class="alert-success">
					<?php
						$message = Session::get('message');
						if($message){
							echo $message;
							Session::put('message',null);
						}
					?>
				</p>
				</div>
				
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->



@endsection('admin_content')