<?php

function connetti_db () {
	global $mysqli, $db_host, $db_user, $db_pass, $db_name;
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	//echo "debug:" . $db_host . $db_name;
	if($mysqli->connect_errno) {
		echo "Errore connessione al database $db_name: " . $mysqli->connect_error;
		return false;
	} else {
		return true;
	}
}
function get_html_commento($msg){
	return PHP_EOL. '<!--' . $msg . '-->'. PHP_EOL;
}
// kkk
function get_html_table_from_query($sql, $extra_table='class="table"'){
			global $mysqli;
			$warning='"warning"';
			$ans="";
			//esego query e creo result
			if($result=$mysqli->query($sql)) {
				$ans.=PHP_EOL."<table $extra_table><thead><tr class=$warning>".PHP_EOL;
				//ricavo n righe e colonne
				$n_cols = $result->field_count;
				$n_rows = $result->num_rows;
				//stampo intestazione tabella
				$campi = $result->fetch_fields();
				for($i=0; $i<$n_cols; $i++){
					$tmp = $campi[$i]->name;
					//print_r($campi[$i]->name);
					$ans .= '<th>'.$campi[$i]->name . '</th>'.PHP_EOL;
				}
				//stampo righe tabella 
				$ans.='</tr></thead><tbody>'.PHP_EOL;
				for($r=0;$r<$n_rows;$r++){
					//n rows
					$row = $result->fetch_array(MYSQLI_NUM);
					$ans.=PHP_EOL.'<tr class="success">'.PHP_EOL;
					for($i=0; $i<$n_cols; $i++){

						$ans .= "\t".'<td>'. $row[$i] . '</td>'.PHP_EOL;
					}
					$ans.='</tr>';
				}
				$ans.='</tbody></table>'.PHP_EOL;
			} else {
				$ans .=get_html_commento("Errore esecuzione query");
			}
			return $ans;
}

function get_select_list($sql, $default, $nome){
			global $mysqli;
			$ans="";
			//esego query e creo result
			if($result=$mysqli->query($sql)) {
				
				$ans.=PHP_EOL."<select name=".$nome.">".PHP_EOL;
				//ricavo n righe e colonne
				$n_cols = $result->field_count;
				$n_rows = $result->num_rows;
				
				for($r=0;$r<$n_rows;$r++){
					//n rows
					$row = $result->fetch_array(MYSQLI_NUM);
					if($row[0]==$default){
						$tmp_def = " SELECTED";
					} else {
						$tmp_def = "";
					}
					$ans.="\t<option value=\"" . $row[0] . "\" $tmp_def> ". $row[1] . "</option>".PHP_EOL;

				}
				$ans.='</select>'.PHP_EOL;
			} else {
				$ans .=get_html_commento("Errore esecuzione query");
			}
			return $ans;
}
?>
