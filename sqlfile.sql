CREATE TABLE AVION(
    immatriculation INTEGER PRIMARY KEY,
    nom VARCHAR(10),
    constructeur VARCHAR(30),
    capacite INTEGER CHECK (capacite >0),
    nombre_reacteurs INTEGER CHECK( nombre_reacteurs>0),
    largeur INTEGER
);


CREATE TABLE baudrien.baudrien_user (
     id INT(11) NOT NULL AUTO_INCREMENT,
     user_role INT(1) NOT NULL,
     email VARCHAR(30) NOT NULL,
     firstname VARCHAR(45),
     lastname VARCHAR(100),
     pwd VARCHAR(255) NOT NULL,
     country VARCHAR(10),
     birthday DATE NOT NULL,
     pseudo VARCHAR(60) NOT NULL,
     token CHAR(40),
     user_avatar VARCHAR(320),
     PRIMARY KEY (id)
 );


      CURRENT_TIMESTAMP (date_inserted),
     CURRENT_TIMESTAMP (date_updated),


CREATE TABLE baudrien.baudrien_location (
    location_id INT(11) NOT NULL AUTO_INCREMENT,
    location_user INT(11),
    location_title VARCHAR(320),
    location_description TEXT,
    location_image VARCHAR(320),
    location_price FLOAT,
    location_link VARCHAR(320),
    location_type VARCHAR(15),
    location_status INT(1),
    location_service_menage INT(1),
    location_service_wifi INT(1),
    location_service_food INT(1),
    location_service_material INT(1),
    location_service_children INT(1),
    menage_price FLOAT,
    wifi_price FLOAT,
    food_price FLOAT,
    children_price FLOAT,
    material_price FLOAT,
    PRIMARY KEY (location_id),
    FOREIGN KEY(location_user)  REFERENCES baudrien_user(id)
);