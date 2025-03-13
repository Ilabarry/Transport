CREATE DATABASE transport;
USE transport;
CREATE TABLE users(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
    prenom varchar(100),
    nom varchar(100),
    email varchar(100) UNIQUE,
    mot_pass varchar(100) NOT null,
    ville_origine varchar(100),
    ville_actuelle varchar(100),
    telephone varchar(100),
    role ENUM("admin","conducteur","client") DEFAULT "client",
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE reservation(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
    depart varchar(100),
    arriver varchar(100),
    date_time datetime,
    rithme varchar(100),
    moins_transport varchar(100),
    id_users int,
    FOREIGN KEY (id_users) REFERENCES users(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE commentaire(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
	nom_conducteur varchar(100),
	conf_conducteur varchar(100),
    commentaires varchar(1000),
    id_users int,
    FOREIGN KEY (id_users) REFERENCES users(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE conducteur(
	id int AUTO_INCREMENT NOT null PRIMARY KEY,
	nom_transport varchar(100),
	type_permi varchar(100),
    information text,
    profil varchar(255),
    id_users int,
    FOREIGN KEY (id_users) REFERENCES users(id),
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);