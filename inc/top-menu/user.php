<?php 
if(isset($_SESSION['user'])):
	$user = $_SESSION['user'];
?>
<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img style="width: 30px;" class="img-circle" src="<?php echo $_SESSION['user']['avatar']?>" />
          <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-item">
            <?php echo $user['name']?>
          </div>
		  <a href="#" class="dropdown-item">
            Sửa hồ sơ
          </a>
          <div class="dropdown-divider"></div>
          <a href="/social_pages_select.php" class="dropdown-item">
            Chọn lại Fanpages
          </a>
		  <a href="#" class="dropdown-item">
            Đổi mật khẩu
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout.php" class="dropdown-item">
            Đăng xuất
          </a>
          
        </div>
      </li>
      
    </ul>
<?php endif; ?>