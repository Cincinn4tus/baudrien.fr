CREATE TABLE AVION(
    immatriculation INTEGER PRIMARY KEY,
    nom VARCHAR(10),
    constructeur VARCHAR(30),
    capacite INTEGER CHECK (capacite >0),
    nombre_reacteurs INTEGER CHECK( nombre_reacteurs>0),
    largeur INTEGER
);


CREATE TABLE baudrien.animals (
     id INT(11) NOT NULL AUTO_INCREMENT,
     user_role INT(1) NOT NULL,
     email VARCHAR(30) NOT NULL,
     firstname VARCHAR(45),
     lastname VARCHAR(100),
     pwd VARCHAR(255) NOT NULL,
     country VARCHAR(10),
     birthday DATE NOT NULL,
     pseudo VARCHAR(60) NOT NULL,
     LOCALTIMESTAMP ([date_inserted]),
     LOCALTIMESTAMP ([date_updated]),
     token CHAR(40),
     user_avatar VARCHAR(320),
     PRIMARY KEY (id)
 );


      CURRENT_TIMESTAMP (date_inserted),
     CURRENT_TIMESTAMP (date_updated),