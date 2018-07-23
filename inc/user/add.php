<div id="collapseAdd" class="collapse">
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
	<h3 id="btn-title" class="card-title">Thêm người dùng</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form id="formData" role="form">
	<div class="card-body">
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Họ và Tên</label>
			<input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tên đăng nhập</label>
			<input id="username" name="username" type="text" class="form-control" placeholder="Tên đăng nhập">
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputPassword1">Mật khẩu</label>
			<input id=password name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
		  </div>
		  
		  <div class="form-group col-6">
			<label for="exampleInputPassword1">Xác nhận mật khẩu</label>
			<input name="repassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
		  </div>
	  </div>
	<div class="row">
	  <div class="form-group col-4">
		<label for="exampleInputEmail1">Email</label>
		<input id="email" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  
	  <div class="form-group col-4">
		<label for="exampleInputEmail1">Số điện thoại</label>
		<input id="phone" name="phone" type="text" class="form-control" placeholder="Số điện thoại">
	  </div>
	  
	  <div class="form-group col-4">
		<label>Giới tính</label>
		<select id="gender" name="gender" class="form-control">
		  <option value="0">Chưa xác định</option>
		  <option value="1">Nam</option>
		  <option value="-1">Nữ</option>
		</select>
	  </div>
	</div>
	<div class="row">
		 <div class="form-group col-4">
			<label>Chọn quyền</label>
			<select id="role_id" name="role_id" class="form-control">
			  
			</select>
		  </div>
	</div>
	  
	  <div class="form-check">
		<input id="status" name="status" value="1" type="checkbox" class="form-check-input" id="status">
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
			var url = "<?php echo FBSALE_API_URL ?>/coreusers/"; // the script where you handle the form input.
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
			var url = "<?php echo FBSALE_API_URL ?>/coreusers/"+id; // the script where you handle the form input.
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