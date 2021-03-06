<div id="collapseAdd" class="collapse">
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
	<h3 id="btn-title" class="card-title">Thêm shipper</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form id="formData" role="form">
	<div class="card-body">
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tên</label>
			<input name="name" type="text" class="form-control form-control-sm" id="name" placeholder="Tên menu">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Email</label>
			<input name="email" type="text" class="form-control form-control-sm" id="email" placeholder="Email">
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Phone</label>
			<input name="phone" type="text" class="form-control form-control-sm" id="phone" placeholder="Phone">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Type</label>
			<input type="text" name="type" class="form-control form-control-sm" id="type" placeholder="Type">
		  </div>
	  </div>
	  <div class="form-check">
		<input id="btn-submit" name="status" type="checkbox" value="1" class="form-check-input" id="status">
		<label class="form-check-label" for="status">Hoạt động</label>
	  </div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
	  <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
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
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceshippers/"; // the script where you handle the form input.
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
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceshippers/"+id; // the script where you handle the form input.
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