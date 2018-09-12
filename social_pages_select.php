<?php require_once 'bootstrap.php'; ?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chọn trang để bắt đầu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/AdminLTE/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">NextNobels FB Sale</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Chọn các Trang để quản lý</p>
	  <ul id="pages_list" class="list-group">
		<?php 
		$pages = $_SESSION['pages'];
		$page_ids = isset($_SESSION['page_ids']) ? $_SESSION['page_ids'] : [];
		?>
		<?php foreach($pages as $page):?>
		  <li class="list-group-item <?php if(in_array($page['id'], $page_ids)):?>active<?php endif;?>" onclick="$(this).toggleClass('active')" rel="<?php echo $page['id']?>"><i class="fa fa-facebook fa-2x" ></i> <?php echo $page['name'];?></li>
		<?php endforeach; ?>
		</ul>
		<br />
		<button type="submit" class="btn btn-primary btn-block btn-flat" onclick="select_pages()">Bắt đầu</button>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- Modal -->
<div class="modal fade modal-primary" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yêu cầu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Cần chọn trang để bắt đầu<br />
		Click vào trang cần quản lý để lựa chọn
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
  function select_pages() {
	  var $pages_list = $('#pages_list');
	  var $item_actives = $('#pages_list').find('li.active');
	  var page_ids = [];
	  $item_actives.each(function(index, item) {
		  page_ids.push($(item).attr('rel'));
	  });
	  if(page_ids.length === 0) {
		  $('#notificationModal').modal('show');
	  } else {
		  $.ajax({
			  url: '/social_pages_select_post.php',
			  data: {
				  page_ids: page_ids
			  },
			  type: 'POST',
			  success: function(resp) {
				  window.location = '/social_posts.php';
			  }
		  });
	  }
  }
</script>
</body>
</html>
