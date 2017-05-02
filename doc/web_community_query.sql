--Query A: elenco degli eventi già svolti, in ordine alfabetico di provincia 


--Query A come soluzione su Internet:
SELECT Eventi.Data, Eventi.Titolo, Luoghi.Nome, Luoghi.FKProvincia
FROM Eventi INNER JOIN Luoghi ON Eventi.FKLuogo = Luoghi.IDLuogo
WHERE Data < now()
ORDER BY Luoghi.FKProvincia;

--Query A che ho pensato
SELECT Eventi.Data, Eventi.Titolo, Luoghi.Nome, Luoghi.FKProvincia
FROM Eventi, Luoghi WHERE Eventi.FKLuogo = Luoghi.IDLuogo
AND Data < now()
ORDER BY Luoghi.FKProvincia;

--Query B: elenco dei membri che non hanno mai inserito un commento 

--Query B:
SELECT Nick
FROM Utenti
WHERE IDUtente NOT IN ( SELECT DISTINCT FKUtente FROM Commenti )
ORDER BY Nick;

--Query C: per ogni evento il voto medio ottenuto in ordine di categoria e titolo

--Query C soluzione Internet: 
SELECT Eventi.Titolo, AVG( Commenti.Voto ) AS rank
FROM Eventi INNER JOIN Commenti ON Commenti.FKEvento = Eventi.IDEvento
GROUP BY Eventi.IDEvento
HAVING rank > 0
ORDER BY Eventi.FKCategoria, Eventi.Titolo;


--Query C Ufficiale

SELECT avg(Voto), Eventi.Titolo AS t, Categorie.Descrizione AS c FROM Commenti
LEFT JOIN Eventi ON
Eventi.IDEvento = Commenti.FKEvento
LEFT JOIN Categorie ON
Categorie.IDCategoria= Eventi.FKCategoria
GROUP BY IDEvento
ORDER BY c ASC, t;

--Query D: i dati dell'utente che ha registrato il maggior numero di eventi

--Query D soluzione Internet :
--i dati dell'utente che ha registrato il maggior numero di eventi
--Prima creiamo una view con i dati aggregati necessari, da questa possiamo poi ricavare i dati richiesti:
CREATE VIEW
Inserimenti
AS
SELECT Eventi.FKUtente AS FKUtente, COUNT(Eventi.IDEvento) AS Totale
FROM Eventi
GROUP BY Eventi.FKUtente;

SELECT Utenti.Nick, Utenti.Email
FROM Inserimenti INNER JOIN Utenti ON Inserimenti.FKUtente = Utenti.IDUtente
WHERE Inserimenti.Totale = (SELECT MAX(Totale) FROM Inserimenti);

--Query D che ho pensato :
--i dati dell'utente che ha registrato il maggior numero di eventi
--Prima creiamo una view con i dati aggregati necessari, da questa possiamo poi ricavare i dati richiesti:
CREATE VIEW
Inserimenti
AS
SELECT Eventi.FKUtente AS FKUtente, COUNT(Eventi.IDEvento) AS Totale
FROM Eventi
GROUP BY Eventi.FKUtente;

SELECT Utenti.Nick, Utenti.Email
FROM Inserimenti,Utenti WHERE Inserimenti.FKUtente = Utenti.IDUtente
AND Inserimenti.Totale = (SELECT MAX(Totale) FROM Inserimenti);



--Query E (che ritengo significativa): elenco degli eventi che si terranno, in ordine di uscita
SELECT Eventi.Data, Eventi.Titolo, Luoghi.Nome, Luoghi.FKProvincia
FROM Eventi, Luoghi WHERE Eventi.FKLuogo = Luoghi.IDLuogo
AND Data > now()
ORDER BY Data;

