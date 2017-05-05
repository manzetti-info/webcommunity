# WebCommunity

## Introduzione

Web Community: Tema d'esame 2015 Informatica

La struttura del progetto è la seguente:
- In [doc](doc) ci sono tutti i file da utilizzare in software di terze parti che sono necessari per il corretto funzionamento del software (Es. dump SQL, CSV, ecc.). Ci sono anche file di documentazione relativi al database (Es. Schema logico).
- La cartella principale è la cartella [sito](sito), in essa vanno inseriti tutti gli script.
  - La cartella [sito/etc](sito/etc) contiene i file di configurazione del database.
  - La cartella [sito/lib](sito/lib) contiene le librerie utilizzate all'interno del sito.
  - La cartella [sito/sub](sito/sub) contiene le varie funzioni utilizzate all'interno del sito.

## Esempi di Codice

Il progetto contiene due librerie:
- **Database.php** che contiene la classe _Database_ per la gestione del database.
- **Auth.php** che contiene la class _Auth_ utile per autenticare facilmente gli utenti.

#### Classe 'Database.php'

Per iniziare, importare la classe, creare un'istanza di essa e controllare se il Database è stato avviato con successo.
```php
/* Ipotizziamo che questo file PHP si trovi in 'sito' */
require('./lib/Database.php')

$db = new Database();
if (!$db) {
	// Errore nella connessione, database non collegato
	echo $db->getError();
}

//Database collegato
...
```

Nella tabella seguente verranno illustrati i metodi presenti nella classe Database.

Metodo | Descrizione | Esempio pratico | Query o risultato generato
------ | ----------- | --------------- | --------------------------
``` connect() ``` | Metodo eseguito nel costruttore, connette lo script al database grazie alle variabili passate nel file _config.php_ situato in _etc/_ (``` $db_host ```, ``` $db_user ```, ``` $db_pass ```, ``` $db_name ``` | ``` $db->connect() ``` | ``` Stampa un messaggio di errore in caso di connessione fallita. ```
``` insert($tabella, $campi, $valori) ``` | Genera una query di tipo INSERT INTO | ``` $db->insert("Utenti", "Email, Pass", "utente@esempio.it", "webcommunity") ``` | ``` INSERT INTO Utenti (Email, Pass) VALUES ('utente@esempio.it', 'webcommunity') ```
``` select($campi, $tabella) ``` | Genera una query di tipo SELECT FROM | ``` $db->select("Email, Pass", "Utenti"); ``` | ``` SELECT Email, Pass FROM Utenti ```
``` update($tabella, $campi) ``` | Genera una query di tipo UPDATE SET | ``` $db->update("Utenti", "Email = 'utente@esempio.it'); ``` | ``` UDPATE Utenti SET Email = 'utente@esempio.it' ```
``` delete($tabella) ``` | Genera una query di tipo DELETE FROM | ``` $db->delete("Utenti"); ``` | ``` DELETE FROM Utenti ```
``` where($condizione) ``` | Concatena ad una query la clausola WHERE | ``` $db->delete("Utenti")->where("Email = 'utente@esempio.it'"); ``` | ``` DELETE FROM Utenti WHERE Email = 'utente@esempio.it' ```
``` setRawQuery($query) ``` | Permette di creare una query manualmente | ``` $db->setRawQuery("SELECT Email, Pass FROM Utenti") ``` | ``` SELECT Email, Pass FROM Utenti ```
``` getRawQuery() ``` | Restituisce la query generata dai metodi sopracitati  (non la esegue, ritorna una stringa). | ``` $db->getRawQuery() ``` | Ipotizzando di aver eseguito il metodo setRawQuery() nell'esempio precedente, il risultato è il seguente: ``` SELECT Email, Pass FROM Utenti ```
``` execute() ``` | Esegue le query generate con i metodi sopracitati. Restituisce l'oggetto query della classe MySQLI oppure null in caso di errore. | ``` $result = $db->select("Email, Pass", "Utenti")->execute() ``` | 'Oggetto [mysqli_result](http://php.net/manual/en/class.mysqli-result.php)' oppure 'null'
``` getArray($tipo_di_fetch) ``` | Trasforma il risultato di una query in un array. Il tipo di array è determinato dall'argomento della funzione (MYSQLI_ASSOC -> Associativo; MYSQLI_NUM -> Indici numerici; MYSQLI_BOTH -> Entrambi) | ``` $result = $db->select("Email, Pass", "Utenti")->getArray(MYSQLI_ASSOC) ``` | 'Un array bidimensionale dove il primo indice indica la riga e il secondo la colonna (Es. ``` $result[0]["Email"] ```)' oppure 'null'
``` getError() ``` | Restituisce l'errore di connessione, in caso ce ne sia uno. | ``` if ($db->getError()) echo $db->getError() ``` | ``` Il messaggio di errore ```

**NB:** Non è necessario nessun metodo _close()_ poiché il database si chiude in automatico nel distruttore della classe.

Esempio di utilizzo dei vari metodi:
```php
/* Ipotizziamo che questo file PHP si trovi in 'sito' */
...

$result = $db->select("Email, Pass", "Utenti")->where("Email = 'utente@esempio.it'")->getArray(MYSQLI_ASSOC);
// $result[riga][colonna]
echo $result[0][Email];
echo $result[0][Pass];
```

#### Classe 'Auth.php'


## Installazione

Istruzioni per l'installazione

## API Reference

Spiegazione funzionamento API (se presenti).

## Licenza

Il progetto WebCommunity utilizza la [Licenza GNU GPLv3](LICENSE)


