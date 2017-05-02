<?php
include ('conf.php');
include ('lib/db.php');
	global $mysqli, $db_host, $db_user, $db_pass, $db_name;
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($mysqli->connect_errno) {
		echo "Errore connessione al database $db_name: " . $mysqli->connect_error;
	}else {
		//echo "Connesso";
	}
		//echo get_select_list('select nome, descrizione from pagina', "inglese", 'categoria');
?>
<html>
	<head><title>Login</title></head>
	<body>
	<h1>Inserisci evento</h1><br>
	<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	Data:<input name="Data" value="0000-00-00" ><br>
	Ora:<input name="Ora"><br>
	Categoria:
	<?php
		echo get_select_list('select IDCategoria, Descrizione from Categorie', "Concerto", 'Categoria');
	?>
	<br>
	Provincia:
	<?php
		echo get_select_list('select IDProvincia, Nome from Province', "AO", 'Provincia');
	?>
	<br>
	Luogo:
	<?php
		echo get_select_list('select IDLuogo, Nome from Luoghi', "Aosta", 'Luogo');
	?>
	<br>
	Titolo:<input name="Titolo"><br>
	Artista:
	<?php
		echo get_select_list('select IDArtista, Denominazione from Artisti', "", 'Artista');
	?>
	<br>
	<input type="submit" value="Invia">
	</form>
	
	<?php
		if (!empty($_POST))
		{
			$data=$_POST['Data'];
			$ora=$_POST['Ora'];
			$categoria=$_POST['Categoria'];
			$provincia=$_POST['Provincia'];
			$luogo=$_POST['Luogo'];
			$titolo=$_POST['Titolo'];
			$artista=$_POST['Artista'];
			//$sql = "INSERT INTO Eventi (Titolo, Data, FKCategoria, FKLuogo, Ora, Provincia, Artista) VALUES ('".$titolo."', '".$data."', ".$categoria.", ".$luogo.", '".$ora."', '".$provincia."', ".$artista."); ";
			$sql = "INSERT INTO Eventi (Titolo, Data, FKCategoria, FKLuogo) VALUES ('".$titolo."', '".$data."', ".$categoria.", ".$luogo."); ";
			echo $sql;
			echo "<br>--------- <br>";
			$ris=$mysqli->query($sql) or die ("Query fallita!"); // Eseguo la query*/
		}
	?>

</body>
</html>
