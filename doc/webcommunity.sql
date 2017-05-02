CREATE TABLE Categorie(
	IDCategoria int PRIMARY KEY AUTO_INCREMENT,
	Descrizione varchar(50)
);

CREATE TABLE Artisti (
	IDArtista int PRIMARY KEY AUTO_INCREMENT,
	Denominazione varchar(50)
);

CREATE TABLE Province(
	IDProvincia char(2) PRIMARY KEY,
	Nome varchar(30)
);


CREATE TABLE Luoghi(
	IDLuogo int PRIMARY KEY AUTO_INCREMENT,
	Nome varchar(30),
	FKProvincia char(2),
	FOREIGN KEY (FKProvincia) REFERENCES Province(IDProvincia)
);

CREATE TABLE Utenti (
	IDUtente int PRIMARY KEY AUTO_INCREMENT,
	FKLuogo int,	
	Nick varchar(10),
	Nome varchar(20),
	Cognome varchar (20),
	Address varchar (30),
	Email varchar (20),
	Pass varchar (20),
	Token varchar (32),
	FOREIGN KEY (FKLuogo) REFERENCES Luoghi(IDLuogo)
);

CREATE TABLE Eventi(
	IDEvento int PRIMARY KEY AUTO_INCREMENT,
	FKCategoria int,
	FKUtente int,
	FKLuogo int,
	Titolo varchar(100),
	Data date,
	FOREIGN KEY (FKCategoria) REFERENCES Categorie(IDCategoria),
	FOREIGN KEY (FKUtente) REFERENCES Utenti(IDUtente),
	FOREIGN KEY (FKLuogo) REFERENCES Luoghi(IDLuogo)
);

CREATE TABLE Preferenze(
	FKUtente int,
	FKCategoria int,
	PRIMARY KEY(FKUtente, FKCategoria),
	FOREIGN KEY (FKUtente) REFERENCES Utenti(IDUtente),
	FOREIGN KEY (FKCategoria) REFERENCES Categorie(IDCategoria)
);

CREATE TABLE Partecipanti(
	FKEvento int,
	FKArtista int,
	PRIMARY KEY(FKEvento, FKArtista),
	FOREIGN KEY (FKEvento) REFERENCES Eventi(IDEvento),
	FOREIGN KEY (FKArtista) REFERENCES Artisti(IDArtista)
);

CREATE TABLE Commenti(
	FKEvento int,
	FKUtente int,
	PRIMARY KEY(FKEvento,FKUtente),
	Post varchar(100),
	Pdata Date,
	Voto int,
	FOREIGN KEY (FKEvento) REFERENCES Eventi(IDEvento),
	FOREIGN KEY (FKUtente) REFERENCES Utenti(IDUtente),
	CHECK (Voto>0 AND Voto<6)
);







