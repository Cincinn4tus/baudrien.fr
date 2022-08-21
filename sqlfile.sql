CREATE TABLE AVION(
    immatriculation INTEGER PRIMARY KEY,
    nom VARCHAR(10),
    constructeur VARCHAR(30),
    capacite INTEGER CHECK (capacite >0),
    nombre_reacteurs INTEGER CHECK( nombre_reacteurs>0),
    largeur INTEGER
);