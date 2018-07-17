<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Data Tables</title>
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
  
  <!-- jQuery -->
<script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
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
<script src="/assets/js/jscolor.js"></script>
<script src="/assets/lib/tinymce/tinymce.min.js" ></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php require 'inc/top-menu.php';?>
  <?php require 'inc/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php require 'inc/content-header.php';?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
		<?php require 'inc/label/list.php'; ?>
		
		<?php require 'inc/label/add.php'; ?>
		
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
<script>
  $(function(){
    setTinymce();
  });
  function setTinymce(checkspelling) {
    var options = {
        selector: "textarea.tinymce",
        forced_root_block : "",
    statusbar: false,
        force_br_newlines : true,
        force_p_newlines : false,
        relative_url: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen media",
            "insertdatetime media table contextmenu paste textcolor"
        ],

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | styleselect formatselect fontselect fontsizeselect | forecolor backcolor latex",
        entity_encoding : "raw",
        relative_urls: false,
        external_filemanager_path: "/assets/lib/Filemanager/filemanager/",
        filemanager_title:"Quản lí file upload" ,

        
        height: 250,
    setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    };
    if(!checkspelling) {
        delete options.external_plugins.nanospell;
        delete options.nanospell_server;
    }
    tinymce.init(options);
}
function setInputTinymce(checkspelling) {
    var options = {
        selector: "textarea.tinymce_input",
        forced_root_block : "",
        force_br_newlines : false,
        force_p_newlines : false,
        relative_url: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "visualblocks code fullscreen media",
            "media table contextmenu textcolor"
        ],
        toolbar: "media image link bold italic underline table | alignleft aligncenter alignjustify forecolor backcolor removeformat fullscreen code",
    statusbar: false,
    menubar: false,
        entity_encoding : "raw",
        relative_urls: false,
        external_filemanager_path: BASE_URL +"/3rdparty/Filemanager/filemanager/",
        filemanager_title:"Quáº£n lĂ½ file upload" ,
        external_plugins: { "filemanager" :BASE_URL +"/3rdparty/Filemanager/filemanager/plugin.min.js", "nanospell": BASE_URL+"/3rdparty/nanospell/plugin.js"},
        nanospell_server: "php",
        height: 130
    };
    if(!checkspelling) {
        delete options.external_plugins.nanospell;
        delete options.nanospell_server;
    }
    tinymce.init(options);
}

</script>
</body>
</html>
