CREATE DATABASE IF NOT EXISTS LeVestiaireDuFoot;
USE LeVestiaireDuFoot;

DROP TABLE IF EXISTS Chaussure;
DROP TABLE IF EXISTS Vêtement;
DROP TABLE IF EXISTS Equipement;

/* ---------------------------------------------------------- */
/*
--
-- Structure de la table Chaussure
--
*/

CREATE TABLE Chaussure (
  id int(1) NOT NULL  AUTO_INCREMENT ,
  libelle varchar(100) NOT NULL,
  ref varchar(42) NOT NULL ,
  prix FLOAT(10) NOT NULL,
  stock int(10),
  PRIMARY KEY (`id`,`ref`)
);

/* ---------------------------------------------------------- */
/*
--
-- Structure de la table Vêtement
--
*/

CREATE TABLE Vêtement (
  id int(1) NOT NULL AUTO_INCREMENT,
  libelle varchar(100) NOT NULL,
  ref varchar(42) NOT NULL ,
  prix FLOAT(10) NOT NULL,
  stock int(10),
  PRIMARY KEY (`id`,`ref`)
);

/* ---------------------------------------------------------- */
/*
--
-- Structure de la table Equipement
--
*/

CREATE TABLE Equipement (
  id int(1) NOT NULL AUTO_INCREMENT,
  libelle varchar(100) NOT NULL,
  ref varchar(42) NOT NULL,
  prix FLOAT(10) NOT NULL,
  stock int(10),
  PRIMARY KEY (`id`,`ref`)
);
