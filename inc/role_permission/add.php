<div id="collapseAdd" class="collapse">
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
	<h3 id="btn-title" class="card-title">Thêm quyền</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form id="formData" role="form">
	<div class="card-body">
	  <div class="row">

		  <div class="form-group col-4">
			<label>Tên vai trò</label>
			<select id="role_id" name="role_id" class="form-control">
			  
			</select>
		  </div>
		  
		  <div class="form-group col-4">
			<label for="exampleInputEmail1">Controller</label>
			<input type="text" name="controller" class="form-control" id="controller" placeholder="Controller">
		  </div>
		  <div class="form-group col-4">
			<label for="exampleInputEmail1">Action</label>
			<input type="text" name="action" class="form-control" id="action" placeholder="Action">
		  </div>
	  </div>
	  <div class="form-check">
		<input name="status" type="checkbox" value="1" class="form-check-input" id="status">
		<label class="form-check-label" for="status">Hoạt động</label>
	  </div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
	  <button id="btn-submit" type="submit" class="btn btn-primary">Thêm mới</button>
	   <div onclick="closeForm();" class="btn btn-danger pull-right">Đóng</div>
	</div>
  </form>
</div>
<!-- /.card -->
</div>
<script type="text/javascript">
	function closeForm(){
		$('#collapseAdd').removeClass('show');
		return false;
	}
	$("#formData").submit(function(e) {
		$('#collapseAdd').removeClass('show');
		if($(this).attr('datatype') == 'add'){
			var url = "<?php echo FBSALE_API_URL ?>/corerolepermissions/"; // the script where you handle the form input.
	   		 $.ajax({
	           type: "POST",
	           url: url,
	           data: $("#formData").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	              fbTable.ajax.reload();
	           }
	        });
		}else if($(this).attr('datatype') == 'edit'){
			var id = $(this).attr('dataid');
			var url = "<?php echo FBSALE_API_URL ?>/corerolepermissions/"+id; // the script where you handle the form input.
	   		 $.ajax({
	           type: "PATCH",
	           url: url,
	           data: $("#formData").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	               fbTable.ajax.reload();
	           }
	        });
		}
	   

	    e.preventDefault(); // avoid to execute the actual submit of the form.
	});


	
</script>