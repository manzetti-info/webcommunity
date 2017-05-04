<?php
	include ("sub/funzioni_stefano.php");
	include ("etc/config.php");
	
	$page = "";
	$page .= get_head_page();
	$page .= connetti_db();
	$page .= "<h1>Eventi passati</h1><br><br>" . get_eventi_passati();
	$page .= "<h1>Voto medio eventi</h1><br><br>" . get_voto_medio_eventi();
	$page .= "<h1>Eventi futuri</h1><br><br>" . get_eventi_futuri();
	$page .= get_end_page();
	echo $page;
?>
