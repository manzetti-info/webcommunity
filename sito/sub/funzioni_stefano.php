<?php	
	function get_eventi_passati(){
		//global $mysqli;
			$ans = "";
			$sql= "SELECT Eventi.Data, Eventi.Titolo, Luoghi.Nome, Luoghi.FKProvincia
			FROM Eventi, Luoghi WHERE Eventi.FKLuogo = Luoghi.IDLuogo
			AND Data < now()
			ORDER BY Luoghi.FKProvincia";
			//echo $sql;
			$ans .= "<h1>Eventi passati</h1>" . get_html_table_from_query ($sql, 'class="table table-bordered"'); 
			return $ans;
	}
	
	function get_voto_medio_eventi(){
		global $mysqli;
			$ans = "";
			$sql= "SELECT avg(Voto), Eventi.Titolo AS t, Categorie.Descrizione AS c FROM Commenti
					LEFT JOIN Eventi ON
					Eventi.IDEvento = Commenti.FKEvento
					LEFT JOIN Categorie ON
					Categorie.IDCategoria= Eventi.FKCategoria
					GROUP BY IDEvento
					ORDER BY c ASC, t";
					$ans .=  "<h1>Voto medio eventi</h1>" . get_html_table_from_query ($sql, 'class="table table-bordered"'); 	
			return $ans;
	}

	function get_eventi_futuri(){
		global $mysqli;
			$ans = "";
			$sql= "SELECT Eventi.Data, Eventi.Titolo, Luoghi.Nome, Luoghi.FKProvincia
					FROM Eventi, Luoghi WHERE Eventi.FKLuogo = Luoghi.IDLuogo
					AND Data > now()
					ORDER BY Data;";
			$ans .= "<h1>Eventi futuri</h1>" . get_html_table_from_query ($sql, 'class="table table-bordered"'); 
			return $ans;
	}
