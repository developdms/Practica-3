
CREATE DATABASE DMS_BUSINESS_MANAGER CHARACTER SET latin1 COLLATE latin1_spanish_ci;

USE DMS_BUSINESS_MANAGER;

CREATE TABLE IF NOT EXISTS User(
    idUser INTEGER PRIMARY KEY AUTO_INCREMENT,
    userName varchar(25) UNIQUE,
    password varchar(40)
);

INSERT INTO User VALUES (0,'root',sha1('root'));
    
CREATE TABLE IF NOT EXISTS Device(
    idDevice varchar(18) PRIMARY KEY ,
    rol enum('admin','term'),
    idUser integer,
    FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Bill(
    idBill integer PRIMARY KEY AUTO_INCREMENT,
    status enum('open','close'),
    infoDateTime datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Product(
    idProduct INTEGER PRIMARY KEY AUTO_INCREMENT,
    description varchar(100) NOT NULL UNIQUE,
    price float(6,2) NOT NULL,
    image varchar(80)
);

CREATE TABLE IF NOT EXISTS OrderDetail(
    idOrderDetail integer PRIMARY KEY AUTO_INCREMENT,
    amount integer NOT NULL,
    price float(6,2) NOT NULL,
    idBill INTEGER NOT NULL,
    idProduct INTEGER NOT NULL,
    FOREIGN KEY (idBill) REFERENCES Bill(idBill) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (idProduct) REFERENCES Product(idProduct) ON UPDATE CASCADE ON DELETE RESTRICT
);


