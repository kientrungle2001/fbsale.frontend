<div id="collapseAdd" class="collapse">
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
	<h3 id="btn-title" class="card-title">Thêm đơn hàng</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form id="formData" role="form">
	<div class="card-body">
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Khách hàng</label>
			<input name="custommer_name" type="text" class="form-control" id="custommer_name" placeholder="Khách hàng">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Email</label>
			<input name="custommer_email" type="email" class="form-control" id="custommer_email" placeholder="Email">
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Phone</label>
			<input name="custommer_phone" type="text" class="form-control" id="custommer_phone" placeholder="Phone">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tông tiền</label>
			<input type="text" name="total" class="form-control" id="total" placeholder="Toongr tiền">
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
			var url = "http://fbsale.vn:1337/ecommerceorders/"; // the script where you handle the form input.
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
			var url = "http://fbsale.vn:1337/ecommerceorders/"+id; // the script where you handle the form input.
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