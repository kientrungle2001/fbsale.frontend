<div class="card card-primary">
	<div class="card-header">
	  <h3 class="card-title">Data Table With Full Features</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>Họ và tên</th>
		  <th>Username</th>
		  <th>Email</th>
		  <th>Số điện thoại</th>
		  <th>Trạng thái</th>
		  <th>Hành động</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
		<tr>
		  <th>Họ và tên</th>
		  <th>Username</th>
		  <th>Email</th>
		  <th>Số điện thoại</th>
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
    fbTable = $("#example1").DataTable({
		ajax: {
		  "url": "http://fbsale.vn:1337/coreusers/find?where={}",
		  "type": "GET",
		  "error": function (e) {
		  },
		  "dataSrc": function (d) {
			 return d
		  }
		},
		processing: true,
        serverSide: true,
		columns: [
			{ data: 'name' },
			{ data: 'username' },
			{ data: 'email' },
			{ data: 'phone' },
			{ data: 'status' },
			{ data : function ( row, type, val, meta ){
				return '<button onclick="editData('+row.id+')" class="btn btn-primary"><i class="fa fa-edit"></i></button>'+' <button onclick="deleteData('+row.id+')" class="btn btn-danger"><i class="fa fa-remove"></i></button>';
			}},
		],

	});
	
  });
  function addData(){
  	$('#formData').attr('datatype', 'add');
  }
  function editData(id){
  	$('#formData').attr('datatype', 'edit');
  	$('#formData').attr('dataid', id);
  	var url = "http://fbsale.vn:1337/coreusers/"+id; // the script where you handle the form input.
	    $.ajax({
		    type: "GET",
		    url: url,
		    dataType: 'json',
		    success: function(data){
		    	$('#collapseAdd').addClass('show');
		    	jQuery.each(data, function(index, item) {
		            $('#'+index).val(item);
		        });

		    }
		});
  }
  function deleteData(id){
  	if(confirm('Bạn có muốn xóa không?')){
	  	var url = "http://fbsale.vn:1337/coreusers/"+id; // the script where you handle the form input.

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
