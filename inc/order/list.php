<div class="card card-primary">
	<div class="card-header">
	  <h3 class="card-title">Quản trị đơn hàng</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>ID</th>
		  <th>Khách hàng</th>
		  <th>Email</th>
		  <th>Phone</th>
		  <th>Tổng tiền</th>
		  <th>Trạng thái đơn hàng</th>
		  <th>Trạng thái</th>
		  <th>Hành động</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
		<tr>
		  <th>ID</th>
		  <th>Khách hàng</th>
		  <th>Email</th>
		  <th>Phone</th>
		  <th>Tổng tiền</th>
		  <th>Trạng thái đơn hàng</th>
		  <th>Trạng thái</th>
		  <th>Hành động</th>
		</tr>
		</tfoot>
	  </table>
	</div>
	<!-- /.card-body -->
	
	<div class="card-footer">
	  <a onclick="addData()" href="#collapseAdd" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseAdd">Thêm mới</a>
	  <button type="submit" class="btn btn-primary">Xuất dữ liệu</button>
	  <button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
	  <button type="submit" class="btn btn-danger">Xóa</button>
	</div>
  </div>
  
<!-- page script -->
<script>
  $(function () {
  	//get products
	var url = "http://fbsale.vn:1337/ecommerceorders/shippers"; // the script where you handle the form input.
	$.ajax({
	   type: "GET",
	   url: url,
	   success: function(data)
	   {
		  data.forEach(function(item,index) {
			  $('#shipper_id').append('<option value="'+item.id+'">'+item.name+'</option>');
		  });
	   }
	});
	//get products
	var url = "http://fbsale.vn:1337/ecommerceorders/products"; // the script where you handle the form input.
	$.ajax({
	   type: "GET",
	   url: url,
	   success: function(data)
	   {
		  $('#product_id0').append('<option value="0">Chọn sản phẩm</option>');
		  products = data;
		  data.forEach(function(item,index) {
			  $('#product_id0').append('<option value="'+item.id+'">'+item.name+'</option>');

		  });
	   }
	});
	var url = "http://fbsale.vn:1337/ecommerceorders/custommers"; // the script where you handle the form input.
	$.ajax({
	   type: "GET",
	   url: url,
	   success: function(data)
	   {
		  data.forEach(function(item,index) {
			  $('#custommer_id').append('<option value="'+item.id+'">'+item.name+'</option>');
		  });
	   }
	});
    fbTable = $("#example1").DataTable({
		ajax: {
		  "url": "http://fbsale.vn:1337/ecommerceorders/datatable",
		  "type": "POST",
		  "error": function (e) {
		  },
		 
		},
		processing: true,
        serverSide: true,
		columns: [
			{ data: 'id' },
			{ data: 'custommer_name' },
			{data: 'custommer_email'},
			{data: 'custommer_phone'},
			{data: 'total'},
			{data: function(row, type, val, meta){
				var html = '<select onchange="updateState(this, '+row.id+')" id="state'+row.id+'" name="state" class="form-control">'+'\
				  <option value="received">Đã nhận</option>'+'\
				  <option value="processing">Đang xử lí</option>'+'\
				  <option value="shipping">Đang vận chuyển</option>'+'\
				  <option value="waitpay">Chờ thanh toán</option>'+'\
				  <option value="completed">Thành công</option>'+'\
				  <option value="cancelled">Hủy</option>'+'\
				  <option value="refunded">Hoàn tiền</option>'+'\
				</select>'+'\
				<script>'+'\
				$("#state'+row.id+'").val("'+row.state+'");'+'\
				<\/script>';
				return html;
				
			}},
			{ data: function(row, type, val, meta){
				if(row.status == 1){
					return '<i class="fa fa-star" style="color: blue; font-size: 120%; cursor: pointer;" onclick="updateStatus(0, '+row.id+');"></i>';
				}else{
					return '<i class="fa fa-star" style="color: black; font-size: 100%; cursor: pointer;" onclick="updateStatus(1,'+row.id+');"></i>';
				}
				
			} },
			{ data : function ( row, type, val, meta ){
				return '<a href="/ecommerce_order_detail.php?id='+row.id+'" class="btn btn-primary"><i class="fa fa-eye"></i></a>' +' <button onclick="editData('+row.id+')" class="btn btn-primary"><i class="fa fa-edit"></i></button>' +' <button onclick="deleteData('+row.id+')" class="btn btn-danger"><i class="fa fa-remove"></i></button>';
			}},
		]
	});
  });

  function updateStatus(status, id){
  		var url = "http://fbsale.vn:1337/ecommerceorders/"+id; // the script where you handle the form input.
	    $.ajax({
		    type: "PATCH",
		    url: url,
		    data: {status, status}, // serializes the form's elements.
           success: function(data)
           {
               fbTable.ajax.reload();
           }
		});
  }

  function updateState(that, id){
  		var url = "http://fbsale.vn:1337/ecommerceorders/"+id; // the script where you handle the form input.
  		var state = $(that).val();
	    $.ajax({
		    type: "PATCH",
		    url: url,
		    data: {state, state}, // serializes the form's elements.
           success: function(data)
           {
               fbTable.ajax.reload();
           }
		});
  }
  
	
  function addData(){
  	$('#formData').attr('datatype', 'add');
  	$('#btn-title').text('Thêm mới');
  	$('#btn-submit').text('Thêm mới');
  }
  function editData(id){
  	$('#btn-title').text('Sửa bản ghi');
  	$('#btn-submit').text('Cập nhật');
  	$('#formData').attr('datatype', 'edit');
  	$('#formData').attr('dataid', id);
  	var url = "http://fbsale.vn:1337/ecommerceorders/"+id; // the script where you handle the form input.
	    $.ajax({
		    type: "GET",
		    url: url,
		    dataType: 'json',
		    success: function(data){
		    	$('#collapseAdd').addClass('show');
		    	$('html, body').animate({
			        scrollTop: $("#formData").offset().top
			    }, 2000);
		    	if(data.status == 1){
		    		$('#status').attr('checked', true);
		    	} else {
					$('#status').attr('checked', false);
				}
		    	jQuery.each(data, function(index, item) {
		            $('#'+index).val(item);
		        });
		        if(data.custommer_id.id != ''){
					$('#custommer_id').val(data.custommer_id.id);
		    	}
		    	if(data.shipper_id.id != ''){
					$('#shipper_id').val(data.shipper_id.id);
		    	}
		    	if(data.ref_order_item){
		    		countProduct = data.ref_order_item.length;
		    		var orderItems = data.ref_order_item;
		    		$('#price0').val(orderItems[0].price);
		    		$('#pricetext0').text(orderItems[0].price);
		    		$('#quantity0').val(orderItems[0].quantity);
		    		var subtotal = orderItems[0].price * orderItems[0].quantity;
		    		$('#subtotal0').text(subtotal);
		    		$('#product_name0').val(orderItems[0].product_name);
		    		$('#product_option_name0').val(orderItems[0].product_option_name);

		    		var url = "http://fbsale.vn:1337/ecommerceorders/selectproduct";
					$.ajax({
			           type: "POST",
			           url: url,
			           data: {product_id: orderItems[0].product_id}, // serializes the form's elements.
			           success: function(data)
			           {
			              	$('#product_option_id0').text('');
			              	$('#product_option_id0').append('<option value="0">Chọn thuộc tính sản phẩm</option>');
			              	if(orderItems[0].product_option_id.length > 0){
								data.product_options.forEach(function(item,index) {
									$('#product_option_id0').append('<option value="'+item.id+'">'+item.name+'</option>');
								});
			    				
			    				$('#product_option_id0').val(orderItems[0].product_option_id);
		    				}	
			           }
			        });
		    		$('#product_id0').val(orderItems[0].product_id);
		    		
		    		orderItems.shift();
		    		$('#orderitems').html('');
		    		orderItems.forEach(function(item, index) {
		    			index = index + 1;
			    		var html = '<div id="orderItem'+index+'" class="row" >'+'\
							<div class="form-group col-3">'+'\
								<label>Chọn sản phẩm</label>'+'\
								<select onchange="selectProduct(this, '+index+')" id="product_id'+index+'" name="orderitems['+index+'][product_id]" class="form-control">'+'\
								</select>'+'\
						  	</div>'+'\
						   <div class="form-group col-3">'+'\
								<label>Chọn thuộc tính sản phẩm</label>'+'\
								<select onchange="selectProductOption(this, '+index+');" id="product_option_id'+index+'" name="orderitems['+index+'][product_option_id]" class="form-control">'+'\
								</select>'+'\
						  	</div>'+'\
						  	<div class="form-group col-2">'+'\
								<label>Giá</label>'+'\
								<div style="height: 38px;" id="pricetext'+index+'" class="form-control"></div>'+'\
								<input id="price'+index+'" name="orderitems['+index+'][price]" type="hidden" />'+'\
						  	</div>'+'\
						  	<div class="form-group col-1">'+'\
								<label>Số lượng</label>'+'\
								<input onblur="subtotal(this, '+index+')" id="quantity'+index+'" name="orderitems['+index+'][quantity]" class="form-control" />'+'\
						  	</div>'+'\
						  	<div class="form-group col-2">'+'\
								<label>Thành tiền</label>'+'\
								<div style="height: 38px;" id="subtotal'+index+'" class="form-control subtotal"></div>'+'\
						  	</div>'+'\
						  	<div class="form-group col-1">'+'\
						  		<label>&nbsp;</label>'+'\
						  		<div>'+'\
									<div onclick="removeOrderItem('+index+')" class="btn  btn-danger"><i class="fa fa-remove"></i></div>'+'\
						  		</div>'+'\
						  	</div>'+'\
						  	<input name="orderitems['+index+'][product_name]" id="product_name'+index+'" type="hidden" />'+'\
						  	<input name="orderitems['+index+'][product_option_name]" type="hidden" id="product_option_name'+index+'"  />'+'\
						</div> ';
						$('#orderitems').append(html);
						$('#product_id'+index).append('<option value="0">Chọn sản phẩm</option>');
						products.forEach(function(item,key) {
							$('#product_id'+index).append('<option value="'+item.id+'">'+item.name+'</option>');
						});

						var url = "http://fbsale.vn:1337/ecommerceorders/selectproduct";
						$.ajax({
				           type: "POST",
				           url: url,
				           data: {product_id: item.product_id}, // serializes the form's elements.
				           success: function(data)
				           {
				              $('#product_option_id'+index).text('');
				              $('#product_option_id'+index).append('<option value="0">Chọn thuộc tính sản phẩm</option>');
							  data.product_options.forEach(function(item,key) {
								  $('#product_option_id'+index).append('<option value="'+item.id+'">'+item.name+'</option>');
							  });
			    				$('#product_option_id'+index).val(item.product_option_id);

				           }
				        });

						$('#product_id'+index).val(item.product_id);
			    		$('#price'+index).val(item.price);
			    		$('#pricetext'+index).text(item.price);
			    		$('#quantity'+index).val(item.quantity);
			    		var subtotal = item.price * item.quantity;
			    		$('#subtotal'+index).text(subtotal);
			    		$('#product_name'+index).val(item.product_name);
			    		$('#product_option_name'+index).val(item.product_option_name);
					});
		    	}

		    }
		});
  }
  function deleteData(id){
  	if(confirm('Bạn có muốn xóa không?')){
	  	var url = "http://fbsale.vn:1337/ecommerceorders/deleteorder?id="+id; // the script where you handle the form input.

	    $.ajax({
		    type: "GET",
		    url: url,
		    success: function(data)
		    {
	            fbTable.ajax.reload();
		    }
		});
	}    
  }
</script>