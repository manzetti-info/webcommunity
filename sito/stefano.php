<?php
	//include ("sub/funzioni_stefano.php");
	include ("sub/functions.php");
	include ("etc/config.php");
	
	$page = "";
	$page .= get_head_page();
	$page .= connetti_db();
	$page .= get_eventi_passati();
	$page .= get_voto_medio_eventi();
	$page .= get_eventi_futuri();
	$page .= get_end_page();
	echo $page;
?>
