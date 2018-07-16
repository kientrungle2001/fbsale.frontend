<?php require_once 'bootstrap.php'; ?>
<?php
$user = json_decode(base64_decode($_GET['user']), true);
$pages = json_decode(base64_decode($_GET['page']), true);
$_SESSION['user'] = $user;
$_SESSION['pages'] = $pages;
header('Location: ' . FBSALE_URL . '/social_pages_select.php');
?>