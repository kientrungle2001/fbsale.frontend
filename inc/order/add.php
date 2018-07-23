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

	  <div class="row">
	  	  	<div class="form-group col-3">
				<label>Chọn sản phẩm</label>
				<select onchange="selectProduct(this, 0);" id="product_id0" name="orderitems[0][product_id]" class="form-control">
				</select>
		  	</div>
		   <div class="form-group col-3">
				<label>Chọn thuộc tính sản phẩm</label>
				<select onchange="selectProductOption(this, 0);" id="product_option_id0" name="orderitems[0][product_option_id]" class="form-control">
				</select>
		  	</div>
		  	<div class="form-group col-2">
				<label>Giá</label>
				<div style="height: 38px;" id="pricetext0" class="form-control"></div>
				<input id="price0" name="orderitems[0][price]" type="hidden" />
		  	</div>
		  	<div class="form-group col-1">
				<label>Số lượng</label>
				<input onblur="subtotal(this, 0)" id="quantity0" name="orderitems[0][quantity]" class="form-control" />
		  	</div>
		  	<div class="form-group col-2">
				<label>Thành tiền</label>
				<div style="height: 38px;" id="subtotal0" class="form-control subtotal"></div>
		  	</div>
		  	<div class="form-group col-1">
		  		<label>&nbsp;</label>
		  		<div>
					<div onclick="addOrderItem()" class="btn  btn-primary"><i class="fa fa-plus-circle"></i></div>
		  		</div>
		  	</div>
		  	<input name="orderitems[0][product_name]" id="product_name0" type="hidden" />
		  	<input name="orderitems[0][product_option_name]" type="hidden" id="product_option_name0"  />

	  </div>

	  <div id="orderitems">
	  	
	  </div>
	  		
	   <div class="row">
	   	 <div class="form-group col-6">
			<label for="exampleInputEmail1">Tổng tiền trước giảm giá</label>
			<input type="text" name="total_before_discount" value="0" class="form-control" id="total_before_discount" placeholder="Tổng tiền trước giảm giá">
		  </div>
	   	  <div class="form-group col-6">
			<label for="exampleInputEmail1">Giảm giá</label>
			<input onblur="totalBeforTax()" name="discount" type="text" class="form-control" value="0" id="discount" placeholder="Giảm giá">
		  </div>
		 
	  </div>
	  <div class="row">
	  	   <div class="form-group col-6">
			<label for="exampleInputEmail1">Tổng tiền trước thuế</label>
			<input type="text" name="total_before_tax" class="form-control" value="0" id="total_before_tax" placeholder="Tổng tiền trước thuế">
		  </div>
		  
	   	  <div class="form-group col-6">
			<label for="exampleInputEmail1">Thuế</label>
			<input onblur="taxTotal()" name="tax" type="text" class="form-control" value="0" id="tax" placeholder="Thuế">
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
	function getTotal(){
		var total = 0;
		$('.subtotal').each(function(){
			var subtotal = parseInt($(this).text());
			if(subtotal > 0){
				total = total + subtotal;
			}
		});
		$('#total_before_discount').val(total);
		$('#total').val(total);
		$('#total_before_tax').val(total);
		return total;
	}
	function totalBeforTax(){
		var beforTotal = getTotal();
		var total_before_tax = 0;
		if(beforTotal > 0){
			total_before_tax = beforTotal - parseInt($('#discount').val());
			$('#total_before_tax').val(total_before_tax);
			$('#total').val(total_before_tax);
			//co thue
			var valtax = parseInt($('#tax').val());
			if(valtax > 0){
				var subtax = total_before_tax * valtax;
				var tax = subtax/100;
				total = total_before_tax - tax;
				$('#total').val(total);
			}	
		}
		return total_before_tax;
	}
	function taxTotal(){
		var total_before_tax = totalBeforTax();
		var total = 0;
		if(total_before_tax > 0){
			var subtax = total_before_tax * parseInt($('#tax').val());
			var tax = subtax/100;
			total = total_before_tax - tax;
			$('#total').val(total);
		}	
		return total;
	}
	function subtotal(that, row){
		var quantity = $(that).val();
		if(quantity){
			var price = $('#price'+row).val();
			var subtotal = quantity * price;
			$('#subtotal'+row).text(subtotal);
			total = getTotal();
			totalBeforTax();
			taxTotal();
		}
	}
	function removeOrderItem(row){
		$('#orderItem'+row).remove();
		getTotal();
		totalBeforTax();
		taxTotal();
	}
	var countProduct = 0;
	function addOrderItem(){
		countProduct = countProduct + 1;

		
		var html = '<div id="orderItem'+countProduct+'" class="row" >'+'\
		<div class="form-group col-3">'+'\
				<label>Chọn sản phẩm</label>'+'\
				<select onchange="selectProduct(this, '+countProduct+')" id="product_id'+countProduct+'" name="orderitems['+countProduct+'][product_id]" class="form-control">'+'\
				</select>'+'\
		  	</div>'+'\
		   <div class="form-group col-3">'+'\
				<label>Chọn thuộc tính sản phẩm</label>'+'\
				<select onchange="selectProductOption(this, '+countProduct+');" id="product_option_id'+countProduct+'" name="orderitems['+countProduct+'][product_option_id]" class="form-control">'+'\
				</select>'+'\
		  	</div>'+'\
		  	<div class="form-group col-2">'+'\
				<label>Giá</label>'+'\
				<div style="height: 38px;" id="pricetext'+countProduct+'" class="form-control"></div>'+'\
				<input id="price'+countProduct+'" name="orderitems['+countProduct+'][price]" type="hidden" />'+'\
		  	</div>'+'\
		  	<div class="form-group col-1">'+'\
				<label>Số lượng</label>'+'\
				<input onblur="subtotal(this, '+countProduct+')" id="quantity'+countProduct+'" name="orderitems['+countProduct+'][quantity]" class="form-control" />'+'\
		  	</div>'+'\
		  	<div class="form-group col-2">'+'\
				<label>Thành tiền</label>'+'\
				<div style="height: 38px;" id="subtotal'+countProduct+'" class="form-control subtotal"></div>'+'\
		  	</div>'+'\
		  	<div class="form-group col-1">'+'\
		  		<label>&nbsp;</label>'+'\
		  		<div>'+'\
					<div onclick="removeOrderItem('+countProduct+')" class="btn  btn-danger"><i class="fa fa-remove"></i></div>'+'\
		  		</div>'+'\
		  	</div>'+'\
		  	<input name="orderitems['+countProduct+'][product_name]" id="product_name'+countProduct+'" type="hidden" />'+'\
		  	<input name="orderitems['+countProduct+'][product_option_name]" type="hidden" id="product_option_name'+countProduct+'"  />'+'\
		</div> ';
		$('#orderitems').append(html);
		$('#product_id'+countProduct).append('<option value="0">Chọn sản phẩm</option>');
		products.forEach(function(item,index) {
			$('#product_id'+countProduct).append('<option value="'+item.id+'">'+item.name+'</option>');
		});

		
	}
	function selectProductOption(that, row){
		var option_id = $(that).val();
		if(option_id != 0){
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceorders/selectproductoption";
			 $.ajax({
	           type: "POST",
	           url: url,
	           data: {option_id: option_id}, // serializes the form's elements.
	           success: function(data)
	           {
				  $('#price'+row).val(data);
				  $('#pricetext'+row).text(data);
				  var product_option_name = $(that).find('option:selected').text();
				  $("#product_option_name"+row).val(product_option_name);
				  var rowdom = $('#quantity'+row);
				  subtotal(rowdom, row);
				  totalBeforTax();
				  taxTotal();
	           }
	        });
		}else{
			 $("#product_option_name"+row).val('');
			var productdom = $('#product_id'+row);
			selectProduct(productdom, row);
			var rowdom = $('#quantity'+row);
		    subtotal(rowdom, row);
		    totalBeforTax();
			taxTotal();
		}
	}
	function selectProduct(that, row){
		var product_id = $(that).val();
		if(product_id != 0){
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceorders/selectproduct";
			 $.ajax({
	           type: "POST",
	           url: url,
	           data: {product_id: product_id}, // serializes the form's elements.
	           success: function(data)
	           {
	              $('#product_option_id'+row).text('');
	              $('#product_option_id'+row).append('<option value="0">Chọn thuộc tính sản phẩm</option>');
				  data.product_options.forEach(function(item,index) {
					  $('#product_option_id'+row).append('<option value="'+item.id+'">'+item.name+'</option>');
				  });
				  $('#price'+row).val(data.price);
				  $('#pricetext'+row).text(data.price);
				  var product_name = $(that).find('option:selected').text();
				  $("#product_name"+row).val(product_name);
				  var rowdom = $('#quantity'+row);
				  subtotal(rowdom, row);
				  totalBeforTax();
				  taxTotal();
	           }
	        });
		}else{
			alert('Phải chọn 1 sản phẩm');
			return false;
		}
		
	}
	function closeForm(){
		$('#collapseAdd').removeClass('show');
		return false;
	}
	$("#formData").submit(function(e) {
		$('#collapseAdd').removeClass('show');
		if($(this).attr('datatype') == 'add'){
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceorders/createorder"; // the script where you handle the form input.
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
			var url = "<?php echo FBSALE_API_URL ?>/ecommerceorders/editorder?id="+id; // the script where you handle the form input.
	   		 $.ajax({
	           type: "POST",
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