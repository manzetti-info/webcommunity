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
/* Questo file PHP si trova in 'sito' */
require('./lib/Database.php')

$db = new Database();
if (!$db) {
	// Errore nella connessione, database non collegato
	echo $db->getError();
}

//Database collegato
```
Non è necessario nessun metodo _close()_ poiché il database si chiude in automatico nel distruttore della classe.

##### Metodi
La classe Database dispone di differenti metodi

Metodo | Descrizione | Esempio pratico | Query
------ | ----------- | --------------- | -----
insert(\$tabella, \$campi, \$valori) | Genera una query di tipo INSERT INTO | $db->insert("Utenti", "Email, Pass", "utente@esempio.it", "webcommunity") | INSERT INTO Utenti (Email, Pass) VALUES ('utente@esempio.it', 'webcommunity')

#### Classe 'Auth.php'


## Installazione

Istruzioni per l'installazione

## API Reference

Spiegazione funzionamento API (se presenti).

## Licenza

Il progetto WebCommunity utilizza la [Licenza GNU GPLv3](LICENSE)

