#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        Id_user      Int  Auto_increment  NOT NULL ,
        Nom          Varchar (255) NOT NULL ,
        Prenom       Varchar (255) NOT NULL ,
        Email        Varchar (255) NOT NULL ,
        Mot_de_passe Varchar (255) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (Id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Priorite
#------------------------------------------------------------

CREATE TABLE Priorite(
        Id_priorite  Int  Auto_increment  NOT NULL ,
        Nom_priorite Varchar (255) NOT NULL
	,CONSTRAINT Priorite_PK PRIMARY KEY (Id_priorite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tache
#------------------------------------------------------------

CREATE TABLE Tache(
        Id_tache    Int  Auto_increment  NOT NULL ,
        Titre       Varchar (255) NOT NULL ,
        Description Varchar (255) NOT NULL ,
        Date        Date NOT NULL ,
        Id_user     Int NOT NULL ,
        Id_priorite Int NOT NULL
	,CONSTRAINT Tache_PK PRIMARY KEY (Id_tache)

	,CONSTRAINT Tache_User_FK FOREIGN KEY (Id_user) REFERENCES User(Id_user)
	,CONSTRAINT Tache_Priorite0_FK FOREIGN KEY (Id_priorite) REFERENCES Priorite(Id_priorite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        Id_categorie  Int  Auto_increment  NOT NULL ,
        Nom_categorie Varchar (255) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (Id_categorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        Id_tache     Int NOT NULL ,
        Id_categorie Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (Id_tache,Id_categorie)

	,CONSTRAINT Appartenir_Tache_FK FOREIGN KEY (Id_tache) REFERENCES Tache(Id_tache)
	,CONSTRAINT Appartenir_Categorie0_FK FOREIGN KEY (Id_categorie) REFERENCES Categorie(Id_categorie)
)ENGINE=InnoDB;

