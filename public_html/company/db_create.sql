CREATE TABLE IF NOT EXISTS Users (
  id int NOT NULL AUTO_INCREMENT,
  firstname varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  address varchar(255) NOT NULL,
  homephone varchar(255) NOT NULL,
  cellphone varchar(255) NOT NULL,
  PRIMARY KEY (id)
);