<?php
require_once 'bootstrap.php';
if(isset($_SESSION['user'])) {
	header('Location: /social_posts.php');
} else {
	header('Location: /login.php');
}
?>