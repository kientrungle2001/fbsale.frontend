<div id="collapseAdd" class="collapse">
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
	<h3 class="card-title">Thêm trang</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form id="formData" role="form">
	<div class="card-body">
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tên trang</label>
			<input name="name" type="text" class="form-control" id="name" placeholder="Tên menu">
		  </div>
		  
	  </div>
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Facebook id</label>
			<input name="facebook_id" type="text" class="form-control" id="facebook_id" placeholder="Facebook id">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Page id</label>
			<input type="text" name="page_id" class="form-control" id="page_id" placeholder="Page id">
		  </div>
	  </div>
	  <div class="form-check">
		<input name="status" type="checkbox" value="1" class="form-check-input" id="status">
		<label class="form-check-label" for="status">Hoạt động</label>
	  </div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
	  <button type="submit" class="btn btn-primary">Thêm mới</button>
	  <button type="submit" class="btn btn-danger pull-right">Đóng</button>
	</div>
  </form>
</div>
<!-- /.card -->
</div>

<script type="text/javascript">
	
	$("#formData").submit(function(e) {
		$('#collapseAdd').removeClass('show');
		if($(this).attr('datatype') == 'add'){
			var url = "http://fbsale.vn:1337/socialpages/"; // the script where you handle the form input.
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
			var url = "http://fbsale.vn:1337/socialpages/"+id; // the script where you handle the form input.
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