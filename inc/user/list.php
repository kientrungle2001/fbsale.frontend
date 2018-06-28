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
	  <a href="#collapseAdd" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseAdd">Thêm mới</a>
	  <button type="submit" class="btn btn-primary">Xuất dữ liệu</button>
	  <button type="submit" class="btn btn-primary">Nhập dữ liệu</button>
	  <button type="submit" class="btn btn-danger">Xóa</button>
	</div>
  </div>
  
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
		ajax: {
		  "url": "http://fbsale.vn:1337/user/find?where={}",
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
			{ data: 'username' }
		]
	});
  });
</script>