<?php
require_once 'bootstrap.php';
$page_ids = $_SESSION['page_ids'] = $_POST['page_ids'];
$pages = $_SESSION['pages'];
$facebook_page_ids = [];
$facebook_page_tokens = [];
foreach($pages as $page) {
	if(in_array($page['id'], $page_ids)) {
		$facebook_page_ids[] = $page['page_id'];
		$facebook_page_tokens[] = $page['page_token'];
	}
}

$_SESSION['facebook_page_ids'] = $facebook_page_ids;
$_SESSION['facebook_page_tokens'] = $facebook_page_tokens;
