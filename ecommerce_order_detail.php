<?php require_once 'bootstrap.php';?><!DOCTYPE html>
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
<style type="text/css">
  .h38{height: 38px;}
</style>
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
        <?php 
        $orderId = intval($_GET['id']);

        ?>
    		
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
            <h3 id="btn-title" class="card-title">Chi tiết đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="row">
                <div class="form-group col-6">
                <label>Mã đơn hàng: <b class="text-danger">#<?=$orderId;?></b></label>
                
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
              <p><b>Shipper:</b> <span id="shipper"></span></p>
                
              <h4>Chi tiết đơn hàng</h4>
              <div id="orderitems">
                
              </div>
                  
               <div class="row">
                 <div class="form-group col-6">
                <label for="exampleInputEmail1">Tổng tiền trước giảm giá</label>
                <input type="text" name="total_before_discount" value="0" class="form-control" id="total_before_discount" placeholder="Tổng tiền trước giảm giá">
                </div>
                  <div class="form-group col-6">
                <label for="exampleInputEmail1">Giảm giá</label>
                <input name="discount" type="text" class="form-control" value="0" id="discount" placeholder="Giảm giá">
                </div>
               
              </div>
              <div class="row">
                   <div class="form-group col-6">
                <label for="exampleInputEmail1">Tổng tiền trước thuế</label>
                <input type="text" name="total_before_tax" class="form-control" value="0" id="total_before_tax" placeholder="Tổng tiền trước thuế">
                </div>
                
                  <div class="form-group col-6">
                <label for="exampleInputEmail1">Thuế</label>
                <input  name="tax" type="text" class="form-control" value="0" id="tax" placeholder="Thuế">
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
              
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              
               <div onclick="closeForm();" class="btn btn-danger pull-right">print</div>
            </div>
          </div>
          <!-- /.card -->

          <script type="text/javascript">
            
            $(function(){
              var url = "http://fbsale.vn:1337/ecommerceorders/"+<?=$orderId;?>; // the script where you handle the form input.
                $.ajax({
                  type: "GET",
                  url: url,
                  dataType: 'json',
                  success: function(data){
                   
                    $('#shipper').text(data.shipper_id.name);
                    jQuery.each(data, function(index, item) {
                          $('#'+index).val(item);
                    });
                      
                   
                      var orderItems = data.ref_order_item;
                      var html = '<table class="table table-hover table-bordered">'+'\
                        <tr>'+'\
                          <th>Tên sản phẩm'+'\
                          </th>'+'\
                          <th>Tên thuộc tính'+'\
                          </th>'+'\
                          <th>Giá'+'\
                          </th>'+'\
                          <th>Số lượng'+'\
                          </th>'+'\
                           <th>Thành tiền'+'\
                          </th>'+'\
                        </tr>'+'\
                        ';
                      orderItems.forEach(function(item, index) {
                        index = index + 1;
                        var subtotal = item.price * item.quantity;
                        html += '<tr><td>'+item.product_name+'\
                          </td>'+'\
                          <td>'+item.product_option_name+'\
                          </td>'+'\
                          <td>'+item.price+'\
                          </td>'+'\
                          <td>'+item.quantity+'\
                          </td>'+'\
                          <td>'+subtotal+'\
                          </td></tr>';
                      
                      });
                      html += '</table>';
                    $('#orderitems').html(html);
                }
              });
            });
            
          </script>
		 
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
</body>
</html>
