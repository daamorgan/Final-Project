DROP DATABASE IF EXISTS ProjectFinal;
CREATE DATABASE ProjectFinal;
USE ProjectFinal;
CREATE TABLE  Users(
 id INT  NOT NULL AUTO_INCREMENT,
 firstname VARCHAR(32) DEFAULT NULL,
 lastname VARCHAR(32) DEFAULT NULL,
 password VARCHAR(16) DEFAULT NULL,
 email VARCHAR(32) DEFAULT NULL,
 date_joined VARCHAR(32) DEFAULT NULL,
 PRIMARY KEY(id)
);
INSERT INTO Users(firstname,lastname,password,email,date_joined)VALUES
("Ashley","Goldberg","Password123","admin@bugme.com","2017-08-19"),
("Luke","Reynolds","Storminh23","Luke21@gmail.com","2015-11-13"),
("Dennis","RiechBach","Starr3yNight","duncebat@bugs.com","2013-12-12"),
("Lucy","Henry","Huntings12","mastermind@shutin.com","2016-07-07");

CREATE TABLE Issue(
 id INT  NOT NULL AUTO_INCREMENT,
 title VARCHAR (255) DEFAULT NULL,
 description VARCHAR(255) DEFAULT NULL,
 type VARCHAR(16) DEFAULT NULL,
 priority VARCHAR(32) DEFAULT NULL,
 status VARCHAR(32) DEFAULT NULL,
 assigned_to INT  NOT NULL,
 created_by INT  NOT NULL,
 created VARCHAR(32) DEFAULT NULL,
 updated VARCHAR(32) DEFAULT NULL,
 PRIMARY KEY(id)
);
INSERT INTO Issue(title,description,type,priority,status,assigned_to,created_by,created,updated) VALUES
("My First Problem","stuff","bug",1,"open",1,2,"2013-12-11","2012-03-09"),
("The Second problem","More Stuff","bug",2,"open",3,1,"2013-10-03","2012-03-09"),
("I cant stop the information from leaking","My Site's security measures are so horrible","bug",5,"closed",4,1,"2013-10-03","2012-03-09"),
("Constant CSRF attacks on my site","We have noticed that ","bug",3,"in progress",3,2,"2013-10-03","2012-03-09"),
("Access to my web application is being restricted","Admins and users alike can't login","Proposal",4,"in progress",4,2,"2012-05-06","2010-04-04");
