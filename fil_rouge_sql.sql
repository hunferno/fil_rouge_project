#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: auteur
#------------------------------------------------------------

CREATE TABLE auteur(
        id_auteur  Int  Auto_increment  NOT NULL ,
        nom_auteur Varchar (50) NOT NULL
	,CONSTRAINT auteur_PK PRIMARY KEY (id_auteur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: editeur
#------------------------------------------------------------

CREATE TABLE editeur(
        id_editeur             Int  Auto_increment  NOT NULL ,
        raison_sociale_editeur Varchar (50) NOT NULL
	,CONSTRAINT editeur_PK PRIMARY KEY (id_editeur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: theme
#------------------------------------------------------------

CREATE TABLE theme(
        id_theme  Int  Auto_increment  NOT NULL ,
        nom_theme Varchar (255) NOT NULL
	,CONSTRAINT theme_PK PRIMARY KEY (id_theme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: livre
#------------------------------------------------------------

CREATE TABLE livre(
        id_livre            Varchar (255) NOT NULL ,
        titre_livre         Varchar (50) NOT NULL ,
        disponibilite_livre Varchar (50) NOT NULL ,
        date_parution_livre Date NOT NULL ,
        id_theme            Int NOT NULL ,
        id_auteur           Int NOT NULL ,
        id_editeur          Int NOT NULL
	,CONSTRAINT livre_PK PRIMARY KEY (id_livre)

	,CONSTRAINT livre_theme_FK FOREIGN KEY (id_theme) REFERENCES theme(id_theme)
	,CONSTRAINT livre_auteur0_FK FOREIGN KEY (id_auteur) REFERENCES auteur(id_auteur)
	,CONSTRAINT livre_editeur1_FK FOREIGN KEY (id_editeur) REFERENCES editeur(id_editeur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie_user
#------------------------------------------------------------

CREATE TABLE categorie_user(
        id_categorie_user  Int  Auto_increment  NOT NULL ,
        nom_categorie_user Varchar (50) NOT NULL
	,CONSTRAINT categorie_user_PK PRIMARY KEY (id_categorie_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        uniqueId_user         Varchar (50) NOT NULL ,
        nom_user              Varchar (50) NOT NULL ,
        prenom_user           Varchar (50) NOT NULL ,
        adresse_user          Varchar (255) NOT NULL ,
        telephone_user        Varchar (50) NOT NULL ,
        email_user            Varchar (50) NOT NULL ,
        password_user         Varchar (255) NOT NULL ,
        date_inscription_user Date ,
        id_categorie_user     Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (uniqueId_user)

	,CONSTRAINT user_categorie_user_FK FOREIGN KEY (id_categorie_user) REFERENCES categorie_user(id_categorie_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: emprunter
#------------------------------------------------------------

CREATE TABLE emprunter(
        id_livre           Varchar (255) NOT NULL ,
        uniqueId_user      Varchar (50) NOT NULL ,
        date_emprunt_livre Date NOT NULL ,
        date_retour_livre  Date NOT NULL
	,CONSTRAINT emprunter_PK PRIMARY KEY (id_livre,uniqueId_user)

	,CONSTRAINT emprunter_livre_FK FOREIGN KEY (id_livre) REFERENCES livre(id_livre)
	,CONSTRAINT emprunter_user0_FK FOREIGN KEY (uniqueId_user) REFERENCES user(uniqueId_user)
)ENGINE=InnoDB;

