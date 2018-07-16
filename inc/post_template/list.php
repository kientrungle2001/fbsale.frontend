<div class="card card-primary">
	<div class="card-header">
	  <h3 id="btn-title" class="card-title">Quản trị nhãn</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>Id</th>
		  <th>Tên</th>
		  <th>Type</th>
		  <th>Trạng thái</th>
		  <th>Hành động</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
		<tr>
		  <th>Id</th>
		  <th>Tên</th>
		  <th>Type</th>
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
		  "url": "http://fbsale.vn:1337/corelabels/datatable",
		  "type": "POST",
		  "error": function (e) {
		  },
		 
		},
		processing: true,
        serverSide: true,
		columns: [
			{ data: 'id' },
			{ data: 'name' },
			{ data: 'type' },
			{ data: function(row, type, val, meta){
				if(row.status == 1){
					return '<i class="fa fa-star" style="color: blue; font-size: 120%; cursor: pointer;" onclick="updateStatus(0, '+row.id+');"></i>';
				}else{
					return '<i class="fa fa-star" style="color: black; font-size: 100%; cursor: pointer;" onclick="updateStatus(1,'+row.id+');"></i>';
				}
				
			} },
			{ data : function ( row, type, val, meta ){
				return '<button onclick="editData('+row.id+')" class="btn btn-primary"><i class="fa fa-edit"></i></button>'+' <button onclick="deleteData('+row.id+')" class="btn btn-danger"><i class="fa fa-remove"></i></button>';
			}},
		]
	});
  });

  function updateStatus(status, id){
  		var url = "http://fbsale.vn:1337/corelabels/"+id; // the script where you handle the form input.
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
  	var url = "http://fbsale.vn:1337/corelabels/"+id; // the script where you handle the form input.
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
				$('#color')[0].jscolor.fromString(data.color);
		    }
		});
  }
  function deleteData(id){
  	if(confirm('Bạn có muốn xóa không?')){
	  	var url = "http://fbsale.vn:1337/corelabels/"+id; // the script where you handle the form input.

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