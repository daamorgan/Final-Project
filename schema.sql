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
("Ashley","Goldberg","Password123","admin@bugme.com","August 09,2013-8:12PM"),
("Luke","Reynolds","Storminh23","Luke21@gmail.com","Novemeber 13,2012-4:16AM"),
("Dennis","RiechBach","Starr3yNight","duncebat@bugs.com","December 12,2012-12:12PM"),
("Lucy","Henry","Huntings12","mastermind@shutin.com","July 07,2016-09:12AM");

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
("My First Problem","stuff","bug",major,"open",1,2,"November 13,2011-7:14PM","September 13,2012-4:32PM"),
("The Second problem","More Stuff","bug",minor,"open",3,1,"January 22,2012-7:14PM","November 13,2012-7:56PM"),
("I cant stop the information from leaking","My Site's security measures are so horrible","bug",Critical,"closed",4,1,"July 13,2012-7:14PM","June 26,2014-10:14PM"),
("Constant CSRF attacks on my site","We have noticed that ","bug",Critical,"in progress",3,2,"Decemeber 05,2015-5:12AM","August 12,2018-9:14PM"),
("Access to my web application is being restricted","Admins and users alike can't login","Proposal",major,"in progress",4,2,"November 13,2012-7:14PM","November 13,2012-7:14PM");
