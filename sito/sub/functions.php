<?php
	function get_head_page() //layout delle pagine del sito contenetne il menu di navigazione
	{
		return '
			<!DOCTYPE html>
				<html>
					<head>
						<link rel="stylesheet" href="css/bootstrap.min.css" >
						<link href="css/bootstrap.min.css" rel="stylesheet">
						
						<link rel="shortcut icon" href="./immagini/webcommunity.png"/>  
						<title> Web Community Ciccio </title>
						
					
					</head>
						<body>
							<div class="container" >
								<script src="js/jquery.min.js"></script>
								<script src="js/bootstrap.min.js"></script>
							
							
									 <nav class="navbar navbar-inverse">
									  <div class="container-fluid">
										<ul class="nav navbar-nav">
										  <li><a href="home.php">Home</a></li>
										  <li><a href="eventi.php">Eventi</a></li>
										</ul>
										<ul class="nav navbar-nav navbar-right">
										  <li><a href="registrazione.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
										  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
										</ul>
									  </div>
									</nav>';
	}
	
	function get_login()
	{
		return'
			<h1> <span class="glyphicon glyphicon-user"> Login </span></h1>
			<form class="form-inline">
				<input type="text" class="form-control" placeholder="Nickname">
				<input type="password" class="form-control" placeholder="Password">
				<button type="submit" class="btn btn-default">Login</button>
			</form>
			<a href="registrazione.html"> Non ti sei ancora registrato? </a>
		';
	}
	
	function get_registration()
	{
		return'
			<h1> <span class="glyphicon glyphicon-user"> Registrazione </span></h1>
			<form>
			 <fieldset>
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text"  class="form-control" id="nome" placeholder="Inserisci il nome...">
					</div>
					<div class="form-group">
						<label for="cognome">Cognome</label>
						<input type="text" class="form-control" id="cognome" placeholder="Inserisci il cognome...">
					</div>
					<div class="form-group">
						<label for="nome">Nickname</label>
						<input type="text"  class="form-control" id="nome" placeholder="Inserisci il nickname...">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Inserisci l\'indirizzo email...">
					</div>
					<div class="form-group">
						<label for="stato">Eventi  a cui sono interessato</label></br>
						<label>
							<input type="checkbox"> Concerti &nbsp;</label>
						<label>
							<input type="checkbox">Balletti &nbsp;</label>
						<label>
							<input type="checkbox"> Spettacoli &nbsp;</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Ricorda i miei dati
						</label>
					</div>
					<button type="submit" class="btn btn-default">Invia</button>
				</fieldset>
			</form>';
		
	}
	
	
	function get_home()
	{
		return '
			<h1>Web Community Ciccio</h1>
					<p> Siamo una web community che permette di condividere dati e commenti relativi a eventi dal vivo di diverse categorie, ad es empio
						concerti, spettacoli teatrali, balletti, ecc. che si svolgono in Italia.
					</p>
					<p>
						Gli eventi vengono inseriti sul sistema direttamente dai membri stessi della nostra community, che si registrano sul sito fornendo un nickname, nome, cognome, indirizzo di e-mail
						 e scegliendo una o più categorie di eventi a cui sono interessati.</br>
						Ogni membro iscritto riceve periodicamente per posta elettronica una newsletter, emessa automaticamente dal sistema, che riporta gli eventi delle categorie da lui scelte, 
						che si svolgeranno nella settimana seguente nel territorio provinciale dell\'utente. </br>
						I membri registrati possono interagire con la community sia inserendo i dati di un nuovo evento, per il quale occorre specificare categoria, luogo di svolgimento, data, titolo 
						dell\'evento e artisti co involti, sia scrivendo un post con un commento ed un voto (da 1 a 5) su un evento. </br> 
						Il nostro sito offre a tutti, sia membri registrati sia utenti anonimi, la consultazione dei dati on line, tra cui: </br>
						- visualizzazione degli eventi di un certo tipo in ordine cronologico, con possibilita\' di filtro per territorio di una specifica provincia.</br>
						-visualizzazione di tutti i commenti e voti relativi ad un evento.
					</p>
			';
	}

	function get_eventi()
	{
		return'
			<p align="center"> <img src="./immagini/lavori_in_corso.png"> </p>
		';
	}

	function get_end_page()
	{
		return '
					</div>
				</body>
			</html>
		';
		
	}

// Funzione di Elisa
	function commenti() {	

	if($_POST)
 	{
		$post = $_POST["commento"];
		$voto = $_POST["voto"];
		$id_utente = "1";
		$data = "CURDATE()";
		$id_evento = $_POST["id_evento"];
		
		$sql = 'INSERT INTO Commenti(FKEvento, FKUtente, Post, Pdata, Voto) 
				VALUES ('. $id_evento .', '. $id_utente .', '. $post .', '. $data .', '. $voto .');';

		echo $sql;
		/*if($mysqli->query($sql)) {
			echo 'query eseguita: ' . $sql;
		} else {
			echo 'errore esecuzione query: ' . $sql;
		}*/
	} else {
		echo '<hr><h3>Commenti</h3><hr>';

		echo "<form action=" . $_SERVER['PHP_SELF'] . " method='post'>";
		
		
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
