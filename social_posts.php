<?php require_once 'bootstrap.php'?><!DOCTYPE html>
<?php 
$user = $_SESSION['user'];
$facebook_page_ids = $_SESSION['facebook_page_ids'];
$facebook_page_tokens = $_SESSION['facebook_page_tokens'];
$page_ids = $_SESSION['page_ids'];
?>
<html ng-app="fbSaleApp" ng-controller="PostController">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/AdminLTE/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/post.css">
  <script>
	
	FBSALE_API_URL = '<?php echo FBSALE_API_URL?>';
	page_ids = <?php echo json_encode($page_ids)?>
  </script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <?php require 'inc/top-menu.php';?>
  <?php require 'inc/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php //require 'inc/content-header.php';?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		<?php require 'inc/post/list.php'; ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script>
	$.noConflict();
</script>
<!-- Bootstrap 4 -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/AdminLTE/plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- SlimScroll -->
<script src="/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/AdminLTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE/dist/js/demo.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular.min.js" integrity="sha256-ruP2+uorUblSeg7Tozk75u8TaSUKRCZVvNV0zRGxkRQ=" crossorigin="anonymous"></script>

<!-- FB Sale App -->
<script src="/assets/angular/app.js"></script>

<!-- page script -->
<style type="text/css">
  .ml0{margin-left: 0px !important;}
</style>
<script>
(function($) {
  $(function () {
    
    $('[data-toggle="tooltip"]').tooltip()

    if($('body').hasClass('sidebar-collapse')){
      $('.main-sidebar').css('width', '0px');
      $('.main-header').addClass('ml0');
      $('.content-wrapper').addClass('ml0');
    }
    $('#icon-menu').click(function(){
      if($('body').hasClass('sidebar-collapse')){
        $('.main-sidebar').css('width', '250px');
        $('.main-header').removeClass('ml0');
        $('.content-wrapper').removeClass('ml0');
      }else{
        $('.main-sidebar').css('width', '0px');
        $('.main-header').addClass('ml0');
        $('.content-wrapper').addClass('ml0');
      }
    });
    
  });

	
  
})(jQuery);

setInterval(function() {
  jQuery.ajax({
	  url: '<?php echo FBSALE_API_URL?>/socialposts/cron',
	  type: 'POST',
	  data: {
		  page_ids: <?php echo json_encode($page_ids)?>,
		  facebook_id: '<?php echo $user['facebook_id']?>',
		  facebook_token: '<?php echo $user['facebook_token']?>',
		  facebook_page_ids: <?php echo json_encode($facebook_page_ids)?>,
		  facebook_page_tokens: <?php echo json_encode($facebook_page_tokens)?>
	  },
	  success: function(resp) {
		  console.log('Đã tải dữ liệu về database');
	  }
  });
}, 10000);
  
</script>
</body>
</html>
