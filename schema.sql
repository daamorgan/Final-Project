DROP DATABASE IF EXISTS ProjectFinal;
DROP DATABASE IF EXISTS ProjectFinal;
CREATE DATABASE ProjectFinal;
USE ProjectFinal;
CREATE TABLE  Users(
 id INT  NOT NULL PRIMARY KEY,
 firstname VARCHAR(32) DEFAULT NULL,
  lastname VARCHAR(32) DEFAULT NULL,
 password VARCHAR(16) DEFAULT NULL,
 email VARCHAR(32) DEFAULT NULL,
 date_joined VARCHAR(32) DEFAULT NULL
);
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(1,"Ashley","Goldberg","password123","admin@bugme.com","2017-08-19");
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(2,"Luke","Reynolds","Storminh23","Luke21@gmail.com","2015-11-13");
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(3,"Dennis","RiechBach","Starr3yNight","admin@bugme.com","2013-12-12");
INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
VALUES(4,"Lucy","Henry","Huntings12","admin@bugme.com","2016-07-07");

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
INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
VALUES(1,"My First Problem","stuff","bug",1,"open","BJjOHNSON","LukeReynolds","2013-12-11","2012-03-09");
INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
VALUES(2,"The Second problem","More Stuff","bug",2,"open","Nelson","Raymond","2013-10-03","2012-03-09");
INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
VALUES(3,"I cant stop the information from leaking","My Site's security measures are so horrible","bug",5,"closed","David","Lewis Dreadfield","2013-10-03","2012-03-09");
INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
VALUES(4,"Constant CSRF attacks on my site","We have noticed that ","bug",3,"in pogress","Nelson","Raymond","2013-10-03","2012-03-09");