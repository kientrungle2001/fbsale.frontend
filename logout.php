<?php
require_once 'bootstrap.php';
unset($_SESSION['user']);
unset($_SESSION['pages']);
unset($_SESSION['page_ids']);
unset($_SESSION['facebook_page_ids']);
unset($_SESSION['facebook_page_tokens']);
header('location: /login.php');