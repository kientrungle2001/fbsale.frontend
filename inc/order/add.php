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
			<label>Chọn khách hàng</label>
			<select id="custommer_id" name="custommer_id" class="form-control">
			  
			</select>
		  </div>
		   <div class="form-group col-6">
			<label>Chọn shipper</label>
			<select id="shipper_id" name="shipper_id" class="form-control">
			  
			</select>
		  </div>
		</div>
	    <div class="row">
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tên khách hàng</label>
			<input name="custommer_name" type="text" class="form-control" id="custommer_name" placeholder="Tên khách hàng">
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
			<label for="exampleInputEmail1">Địa chỉ</label>
			<input type="text" name="custommer_address" class="form-control" id="custommer_address" placeholder="Địa chỉ">
		  </div>
	  </div>
	  <div id="product" class="row">
	  	  	<div class="form-group col-4">
				<label>Chọn sản phẩm</label>
				<select id="product_id0" name="product_id[]" class="form-control">
			  
				</select>
		  	</div>
		   <div class="form-group col-4">
				<label>Chọn thuộc tính sản phẩm</label>
				<select id="product_option_id0" name="product_option_id[]" class="form-control">
				  
				</select>
		  	</div>
		  	<div class="form-group col-3">
				<label>Số lượng</label>
				<input id="quantity0" name="quantity[]" class="form-control" />
		  	</div>
		  	<div class="form-group col-1">
		  		<label>&nbsp;</label>
		  		<div>
					<div class="btn  btn-primary"><i class="fa fa-plus-circle"></i></div>
		  		</div>
		  	</div>
	  </div>
	   <div class="row">
	   	  <div class="form-group col-6">
			<label for="exampleInputEmail1">Giảm giá</label>
			<input name="discount" type="text" class="form-control" value="0" id="discount" placeholder="Giảm giá">
		  </div>
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tổng tiền trước giảm giá</label>
			<input type="text" name="total_before_discount" value="0" class="form-control" id="total_before_discount" placeholder="Tổng tiền trước giảm giá">
		  </div>
		  
	  </div>
	  <div class="row">
	   	  <div class="form-group col-6">
			<label for="exampleInputEmail1">Thuế</label>
			<input name="tax" type="text" class="form-control" value="0" id="tax" placeholder="Thuế">
		  </div>
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tổng tiền trước thuế</label>
			<input type="text" name="total_before_tax" class="form-control" value="0" id="total_before_tax" placeholder="Tổng tiền trước thuế">
		  </div>
		  
	  </div>
	  <div class="row">
	   	  <div class="form-group col-6">
			<label for="exampleInputEmail1">Tổng tiền</label>
			<input name="total" type="text" class="form-control" id="total" value="0" placeholder="Tổng tiền">
		  </div>
		  <div class="form-group col-6">
			<label for="exampleInputEmail1">Trạng thái đơn hàng</label>
			<select id="state" name="state" class="form-control">
			  <option value="received">Đã nhận</option>
			  <option value="processing">Đang xử lí</option>
			  <option value="shipping">Đang vận chuyển</option>
			  <option value="waitpay">Chờ thanh toán</option>
			  <option value="completed">Thành công</option>
			  <option value="cancelled">Hủy</option>
			  <option value="refunded">Hoàn tiền</option>
			</select>
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