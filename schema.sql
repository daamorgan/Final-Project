DROP DATABASE IF EXISTS ProjectFinal;
CREATE DATABASE ProjectFinal;
USE ProjectFinal;
--Add Auto Increment for ID/Primary Key--
CREATE TABLE  Users(
 id INT  NOT NULL PRIMARY KEY,
 firstname VARCHAR(32) DEFAULT NULL, 
  lastname VARCHAR(32) DEFAULT NULL,
 password VARCHAR(16) DEFAULT NULL,
 email VARCHAR(32) DEFAULT NULL,
 date_joined VARCHAR(32) DEFAULT NULL
);
CREATE TABLE Issue(
id INT  NOT NULL PRIMARY KEY, 
 title VARCHAR(32) DEFAULT NULL, 
  description VARCHAR(32) DEFAULT NULL,
 type VARCHAR(16) DEFAULT NULL,
  priority VARCHAR(32) DEFAULT NULL,
 status VARCHAR(32) DEFAULT NULL,
  assigned_to VARCHAR(32) DEFAULT NULL,
 created_by VARCHAR(32) DEFAULT NULL,
  created VARCHAR(32) DEFAULT NULL,
 updated VARCHAR(32) DEFAULT NULL
 
);
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(1,"Ashley","Goldberg","password123","admin@bugme.com");
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(2,"Luke","Reynolds","Storminh23","Luke21@gmail.com");
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(3,"Dennis","RiechBach","Starr3yNight","admin@bugme.com");
INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
VALUES(1,"My First Problem"," ","bug",1,"open","BJjOHNSON","LukeReynolds","2013-12-11"," ");