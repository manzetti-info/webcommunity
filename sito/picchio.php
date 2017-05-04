<?php

	//include ("sub/functions.php"); // spostato in config.php
	include ("etc/config.php");
	$page = "";
	$page .= get_head_page();
	
	
	if (connetti_db()) {
		$page .= "Lavori in corso: " . $db_user;		
	} else {
		$page .= "Errore connessione: " . $db_user;
	}
	$page .= get_end_page();
	echo $page;
?>
