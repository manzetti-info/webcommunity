<?php
	include ("sub/functions.php");
	$page = "";
	$page .= get_head_page();
	$page .= get_login();
	$page .= get_end_page();
	echo $page;
?>
