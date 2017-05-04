<?php

	//include ("sub/functions.php"); // spostato in config.php
	include ("etc/config.php");
	$page = "";
	$page .= get_head_page();
	
	$page .= get_home();
	$page .= get_end_page();
	echo $page;
?>
