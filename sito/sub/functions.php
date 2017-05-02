<?php
	function get_head_page() //layout delle pagine del sito contenetne il menu di navigazione
	{
		echo '
			<!DOCTYPE html>
				<html>
					<head>
						<link rel="stylesheet" href="/css/bootstrap.min.css" >
						<link rel="stylesheet" href="/css/style.css" >
						<link href="css/bootstrap.min.css" rel="stylesheet">
						
						<link rel="shortcut icon" href="webcommunity.png"/>  
						<title> Web Community Ciccio </title>
						
					
					</head>
						<body>
							<div class="container" >
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
		echo'
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
		echo'
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
		echo '
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
		echo'
			<p align="center"> <img src="lavori_in_corso.png"> </p>
		';
	}

	function get_end_page()
	{
		echo '
					</div>
				</body>
			</html>
		';
		
	}

?>
