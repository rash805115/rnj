Create table zipcode ( 
zip		INTEGER , 
city		VARCHAR(50),
state		VARCHAR(50),
PRIMARY KEY (zip) );

Create table users (  
uid		INTEGER,
name		VARCHAR(20),
email		VARCHAR(50),
username	VARCHAR(20)	NOT NULL,
password	VARCHAR(20) 	NOT NULL,
streetaddr	VARCHAR(100),
zip		INTEGER 	NOT NULL,
ukind		CHAR(1),
CHECK (ukind='C' or ukind='E'),
UNIQUE (username),         
PRIMARY KEY (uid),
FOREIGN KEY (zip)  REFERENCES zipcode(zip));

Create table customer (  
uid		INTEGER,
ckind		CHAR(1),
CHECK (ckind='H' or ckind='B'),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE);

Create table homecustomer ( 
uid		INTEGER,
marriage	CHAR(1),
gender		CHAR(1),
age		INTEGER,
income		INTEGER,
CHECK (marriage='S' or marriage='M' or marriage='D'), 
CHECK (gender='M' or gender='F'),
CHECK (age>10),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE);

Create table businesscustomer ( 
uid		INTEGER,
category	VARCHAR(20),
annualincome	VARCHAR(20),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE);

Create table pkind ( 
kid 		INTEGER,
kname		VARCHAR(50),
PRIMARY KEY (kid) );

Create table product ( 
pid		INTEGER,
kid		INTEGER 	NOT NULL,
pname 		VARCHAR(50),
tinventory	INTEGER,
price		INTEGER,
imageurl   	VARCHAR(100),
PRIMARY KEY (pid),
FOREIGN KEY (kid)  REFERENCES pkind(kid));

Create table transaction (
tid 		INTEGER,
pid 		INTEGER	NOT NULL,
date 		DATE,
quantity 	INTEGER, 
PRIMARY KEY (tid),
FOREIGN KEY (pid)  REFERENCES product(pid));

Create table employee (
uid		INTEGER,
title		VARCHAR(100),
salary		INTEGER,
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE);

Create table region (
rid 		INTEGER ,
rname		VARCHAR(30),
uid 		INTEGER 	NOT NULL,
PRIMARY KEY (rid),
FOREIGN KEY (uid)  REFERENCES users(uid));

Create table store (
sid 		INTEGER,
rid 		INTEGER 	NOT NULL,
streetaddr	VARCHAR(100),
zip		INTEGER 	NOT NULL,
uid		INTEGER	NOT NULL,
PRIMARY KEY (sid),
FOREIGN KEY (rid)  REFERENCES region(rid),
FOREIGN KEY (zip)  REFERENCES zipcode(zip),
FOREIGN KEY (uid)  REFERENCES users(uid));

Create table belong (  
uid		INTEGER,
sid		INTEGER,
PRIMARY KEY (uid, sid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE,
FOREIGN KEY (sid)  REFERENCES store(sid) ON DELETE CASCADE);

Create table interested ( 
uid		INTEGER,
pid		INTEGER,
PRIMARY KEY (uid, pid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE,
FOREIGN KEY (pid)  REFERENCES product(pid)    ON DELETE CASCADE); 

Create table review ( 
uid		INTEGER,
pid		INTEGER,
comments	VARCHAR(200),
rate		INTEGER,
PRIMARY KEY (uid, pid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE,
FOREIGN KEY (pid)  REFERENCES product(pid)    ON DELETE CASCADE ); 

Create table buy (  
tid		INTEGER,
uid		INTEGER 	NOT NULL,
PRIMARY KEY (tid),
FOREIGN KEY (tid)  REFERENCES transaction(tid)  ON DELETE CASCADE,
FOREIGN KEY (uid)  REFERENCES users(uid));

Create table sell (  
tid		INTEGER,
uid		INTEGER 	NOT NULL,
PRIMARY KEY (tid),
FOREIGN KEY (tid)  REFERENCES transaction(tid)  ON DELETE CASCADE,
FOREIGN KEY (uid)  REFERENCES users(uid));

Create table workin (  
uid		INTEGER 	NOT NULL,
sid		INTEGER,
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES users(uid)  ON DELETE CASCADE,
FOREIGN KEY (sid)  REFERENCES store(sid)  ON DELETE CASCADE);

Create table has (
sid 		INTEGER,
pid 		INTEGER	NOT NULL,
sinventory	INTEGER,
PRIMARY KEY (sid, pid),
FOREIGN KEY (sid)  REFERENCES store(sid)       ON DELETE CASCADE, 
FOREIGN KEY (pid)  REFERENCES product(pid)  ON DELETE CASCADE );


