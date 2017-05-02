<?php  

	//global $mysqli; //connetti_db();

function commenti() {	
	if($_POST)
 	{
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
	} else {
		echo '<hr><h3>Commenti</h3><hr>';

		echo "<form action=" .$_SERVER['PHP_SELF'] . " method='post'>";
		?>

		<div class="form-group">
			<label for="voto">Voto:</label>
			<br>
			<label class="radio-inline">
				<input type="radio" name="voto" id="inlineRadio1" value="1"> 1 stella
			</label>
			<label class="radio-inline">
	  			<input type="radio" name="voto" id="inlineRadio2" value="2"> 2 stelle
	  		</label>
			<label class="radio-inline">
				<input type="radio" name="voto" id="inlineRadio3" value="3"> 3 stelle
			</label>
			<label class="radio-inline">
				<input type="radio" name="voto" id="inlineRadio3" value="4"> 4 stelle
			</label>
			<label class="radio-inline">
				<input type="radio" name="voto" id="inlineRadio3" value="5"> 5 stelle
			</label>
		</div>
		<div class="form-group">
			<label for="commento">Commento:</label>
			<textarea class="form-control" name="commento" rows="4" placeholder="Inserisci il commento"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>

	<?php
}
?>