-- Création de la base de données
CREATE DATABASE wiki;

-- Utilisation de la base de données
USE wiki;

-- Création de la table User
CREATE TABLE `user` (
  `idUser` int(10) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) UNIQUE,
  `password` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(100)NOT NULL
);

-- Création de la table Category
CREATE TABLE category (
    idCategory INT PRIMARY KEY AUTO_INCREMENT,
    nameCategory VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL

);

-- Création de la table Tag
CREATE TABLE tag (
    idTag INT PRIMARY KEY AUTO_INCREMENT,
    nameTage VARCHAR(255) NOT NULL
);

-- Création de la table Wiki
CREATE TABLE wiki (
    idWiki INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    creationDate DATE NOT NULL,
    modifyDate DATE NOT NULL,
    idUser INT,
    idCategory INT,
    FOREIGN KEY (idUser) REFERENCES user(idUser),
    FOREIGN KEY (idCategory) REFERENCES category(idCategory)
);

-- Table de liaison entre Wiki et Tag pour gérer la relation many-to-many
CREATE TABLE wikiTag (
    idWiki INT,
    idTag INT,
    FOREIGN KEY (idWiki) REFERENCES wiki(idWiki),
    FOREIGN KEY (idTag) REFERENCES tag(idTag)
);
