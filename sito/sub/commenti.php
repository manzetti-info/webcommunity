<?php  
	global $mysqli; //connetti_db();
	
	$post = $_POST["commento"];
	$voto = $_POST["voto"];
	$id_utente = "1";
	$data = "CURDATE()";
	$id_evento = "3";
	
	$sql = 'INSERT INTO Commenti(FKEvento, FKUtente, Post, Pdata, Voto) 
			VALUES ('. $id_evento .', '. $id_utente .', '. $post .', '. $data .', '. $voto .');';

	echo $sql;

	if($mysqli->query($sql)) {
		echo "query eseguita";
	} else {
		echo "errore esecuzione query";
	}
	
?>