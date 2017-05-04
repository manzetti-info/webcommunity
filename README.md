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

Importare la classe dal percorso [lib/Database.php](lib/Database.php) e creare un'istanza di essa.
```php
require('./lib/Database.php')

$db = new Database();
```

#### Classe 'Auth.php'


## Installazione

Istruzioni per l'installazione

## API Reference

Spiegazione funzionamento API (se presenti).

## Licenza

[Licenza GNU GPLv3](LICENSE)
