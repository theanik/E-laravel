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
			<form class="form-horizontal" action="{{ url('/update_product') }}" method="post" enctype= "multipart/form-data" >
				{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Name</label>
				  <div class="controls">
					<input type="text" name="product_name" required="1">
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3">Category Name</label>
					<div class="controls">
					  <select id="selectError3" name="cat_id">
					  	<?php
					  		$all_published_cat = DB::table('tbl_category')
					  							->where('publicaton_status',1)
					  							->get();
					  		foreach($all_published_cat as $cat_all_data){
					  	?>
						<option value="{{ $cat_all_data->cat_id }}">{{ $cat_all_data->cat_name }}</option>
						<?php
							}
						?>
						
					  </select>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError3">Brand Name</label>
					<div class="controls">
					  <select id="selectError3" name="brand_id">
						<?php
					  		$all_published_brand = DB::table('brand')
					  							->where('publication_status',1)
					  							->get();
					  		foreach($all_published_brand as $brand_all_data){
					  	?>
						<option value="{{ $brand_all_data->brand_id }}">{{ $brand_all_data->brand_name }}</option>
						<?php
							}
						?>
					  </select>
					</div>
				  </div>
				        
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product short Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="product_short_descrition"></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product long Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" rows="3" name="product_long_descrition"></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Price</label>
				  <div class="controls">
					<input type="text" name="product_price" required="1">
					
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Image</label>
				  <div class="controls">
					<input type="file" name="product_image" required="1">
					
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Size</label>
				  <div class="controls">
					<input type="text" name="product_size" required="1">
					
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Color</label>
				  <div class="controls">
					<input type="text" name="product_color" required="1">
					
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="fileInput">Publisher Status</label>
				  <div class="controls">
					<input type="checkbox" name="publication_status" value="1">
				  </div>
				</div>  
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product</button>
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