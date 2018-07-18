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
			
			{ data: function(row, type, val, meta){
				if(row.status == 1){
					return '<i class="fa fa-star" style="color: blue; font-size: 120%; cursor: pointer;" onclick="updateStatus(0, '+row.id+');"></i>';
				}else{
					return '<i class="fa fa-star" style="color: black; font-size: 100%; cursor: pointer;" onclick="updateStatus(1,'+row.id+');"></i>';
				}
				
			} },
			{ data : function ( row, type, val, meta ){
				return '<a class="btn btn-primary" href="/ecommerce_order_items.php?orderId='+row.id+'"><i class="fa fa-eye"></i></a> '+'<button onclick="editData('+row.id+')" class="btn btn-primary"><i class="fa fa-edit"></i></button>' +' <button onclick="deleteData('+row.id+')" class="btn btn-danger"><i class="fa fa-remove"></i></button>';
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

		    }
		});
  }
  function deleteData(id){
  	if(confirm('Bạn có muốn xóa không?')){
	  	var url = "http://fbsale.vn:1337/ecommerceorders/"+id; // the script where you handle the form input.

	    $.ajax({
		    type: "DELETE",
		    url: url,
		    success: function(data)
		    {
		        fbTable.ajax.reload();
		    }
		});
	}    
  }
</script>