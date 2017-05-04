insert into Utenti(IDUtente, Nick, Nome, Cognome, Address, Email, Pass, FKLuogo) values 
(1,"m.rossi","Mario","Rossi", "Via Torino", "m.rossi@gmail.com","passwd",3),
(2,"a.bianchi","Andrea","Bianchi", "Via Porta", "a.bianchi@gmail.com","passwdcriptata",4),
(3,"franco.neri","Franco","Neri", "Via Roma", "f.neri@gmail.com","pass",2),
(4,"marco.verdi","Marco","Verdi", "Via Edelweiss", "marco.verdi@gmail.com","passwdmarco",1),
(5,"v.br","Vincezo","Brunet", "Via Caduti", "v.brunet@gmail.com","ciao",5),
(6,"s.nap","Saverio","Napoli", "Via Duca", "s.napoli@gmail.com","svnap",3),
(7,"l.toscan","Ludovico","Toscano", "Via Entreves", "l.tosc@gmail.com","dsadsa",3),
(8,"stefano.verdi","Stefano","Verdi", "Via Edelweiss", "stefano.verdi@gmail.com","ste98",1),
(9,"stefano.gatto","Stefano","Gatto", "Via Brombeis", "ste.gatto@gmail.com","gatto",100);
(10,"v.br","Vincezo","Brunet", "Via Caduti", "v.brunet@gmail.com","ciao",5),
(11,"s.nap","Saverio","Napoli", "Via Duca", "s.napoli@gmail.com","svnap",3),
(12,"l.toscan","Ludovico","Toscano", "Via Entreves", "l.tosc@gmail.com","dsadsa",3),
(13,"stefano.verdi","Stefano","Verdi", "Via Edelweiss", "stefano.verdi@gmail.com","ste98",1);


insert into Artisti(IDArtista, Denominazione) values 
(1,"Cantante"),
(2,"Comico"),
(3,"Ballerino"),
(4,"Mago");


insert into Eventi(IDEvento,FKCategoria,FKUtente,FKLuogo,Titolo,Data) values 
(1,1,2,3,"Concerto Franchino",16/01/2017),
(2,2,1,4,"Spettacolo di Aldo,Giovanni e Giacomo",19/02/2017),
(3,4,4,3,"Esibizione Bolle",1/03/2017),
(4,3,3,4,"Esibizione Mago Silvan",11/03/2017),
(5,1,8,2,"Concerto Madonna",20-03-2017),
(6,2,6,2,"Spettacolo Checco Zalone",19-01-2017),
(7,1,5,1,"Concerto Gianni Morandi",21-03-2017),
(8,1,7,2,"Esibizione Mago Forest",11-02-2017);


insert into Categorie(IDCategoria, Descrizione) values 
(1,"Concerto"),
(2,"Teatro"),
(3,"Danza"),
(4,"Spettacolo");


insert into Commenti(FKEvento,FKUtente, Post, Pdata, Voto) values 
(1,2,"Grandissima serata in compagnia della musica del nostro Franchino",17/01/2017,8),
(2,1,"Grandi risate con il trio comico più famoso d'Italia",21/02/2017,9),
(3,3,"Grande esibizione di Bolle",4/03/2017,7),
(4,4,"Non benissimo",12/03/2017,5),
(5,8,"Pensavo meglio",2017-03-22,6),
(6,6,"Grande esibizione di Checco",2017-01-22,8),
(7,5,"Un applauso a Gianni Morandi",2017-03-22,7),
(8,7,"Grandi risate con Forest",2017-02-13,8);


insert into Preferenze(FKUtente,FKCategoria) values 
(1,2),
(2,1),
(4,3),
(3,4);


insert into Partecipanti(FKEvento,FKArtista) values 
(1,1),
(2,2),
(3,3),
(4,4);

--Luoghi e Province caricate da file