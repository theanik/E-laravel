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
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/update_category',$cat_data_by_cat_id->cat_id) }}" method="post">
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name</label>
				  <div class="controls">
					<input type="text" name="cat_name" value="{{ $cat_data_by_cat_id->cat_name }}">
					
				  </div>
				</div>
				        
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Categoy Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="cat_description">{{ $cat_data_by_cat_id->cat_description }}</textarea>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Category</button>
				  <button type="reset" class="btn">Cancel</button>
				  
					<?php
						$message = Session::get('message');
						if($message){
							?>
							<script type="text/javascript">
								var mes = "{{ $message }}";
								alert(mes);
							</script>
							<?php
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