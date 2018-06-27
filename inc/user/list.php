<div class="card">
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