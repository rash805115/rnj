Create table Zipcode ( 
zip		INTEGER , 
city		VARCHAR(50),
state		VARCHAR(50),
PRIMARY KEY (zip) );

Create table Users (  
uid		INTEGER,
name		VARCHAR(20),
email		VARCHAR(50),
username	VARCHAR(20)	NOT NULL,
password	VARCHAR(20) 	NOT NULL,
street_addr	VARCHAR(100),
zip		INTEGER 	NOT NULL,
ukind		CHAR(1),
CHECK (ukind='Customer' or ukind='Employee'),
UNIQUE (username),         
PRIMARY KEY (uid),
FOREIGN KEY (zip)  REFERENCES Zipcode(zip));

Create table Customer (  
uid		INTEGER,
ckind		CHAR(1),
CHECK (ckind='Home_Customer' or ckind='Business_Customer'),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE);

Create table Home_Customer ( 
uid		INTEGER,
marriage	CHAR(1),
gender		CHAR(1),
age		INTEGER,
income		INTEGER,
CHECK (marriage='single' or marriage='married'), 
CHECK (gender='M' or gender='F'),
CHECK (age>10),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE);

Create table Business_Customer ( 
uid		INTEGER,
category	VARCHAR(20),
annual_income	VARCHAR(20),
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE);

Create table P_kind ( 
kid 		INTEGER,
kname		VARCHAR(50),
PRIMARY KEY (kid) );

Create table Product ( 
pid		INTEGER,
kid		INTEGER 	NOT NULL,
pname 		VARCHAR(50),
t_inventory	INTEGER,
price		INTEGER,
image_url   	VARCHAR(100),
PRIMARY KEY (pid),
FOREIGN KEY (kid)  REFERENCES P_kind(kid));

Create table Transaction (
tid 		INTEGER,
pid 		INTEGER	NOT NULL,
date 		DATE,
quantity 	INTEGER, 
PRIMARY KEY (tid),
FOREIGN KEY (pid)  REFERENCES Product(pid));

Create table Employee (
uid		INTEGER,
title		VARCHAR(100),
salary		INTEGER,
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE);

Create table Region (
rid 		INTEGER ,
rname		VARCHAR(30),
uid 		INTEGER 	NOT NULL,
PRIMARY KEY (rid),
FOREIGN KEY (uid)  REFERENCES Users(uid));

Create table Store (
sid 		INTEGER,
rid 		INTEGER 	NOT NULL,
street_addr	VARCHAR(100),
zip		INTEGER 	NOT NULL,
uid		INTEGER	NOT NULL,
PRIMARY KEY (sid),
FOREIGN KEY (rid)  REFERENCES Region(rid),
FOREIGN KEY (zip)  REFERENCES Zipcode(zip),
FOREIGN KEY (uid)  REFERENCES Users(uid));

Create table Belong (  
uid		INTEGER,
sid		INTEGER 	NOT NULL,
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE,
FOREIGN KEY (sid)  REFERENCES Store(sid) ON DELETE CASCADE);

Create table Interested ( 
uid		INTEGER,
pid		INTEGER,
PRIMARY KEY (uid, pid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE,
FOREIGN KEY (pid)  REFERENCES Product(pid)    ON DELETE CASCADE); 

Create table Review ( 
uid		INTEGER,
pid		INTEGER,
comments	VARCHAR(200),
rate		INTEGER,
PRIMARY KEY (uid, pid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE,
FOREIGN KEY (pid)  REFERENCES Product(pid)    ON DELETE CASCADE ); 

Create table Buy (  
tid		INTEGER,
uid		INTEGER 	NOT NULL,
PRIMARY KEY (tid),
FOREIGN KEY (tid)  REFERENCES Transaction(tid)  ON DELETE CASCADE,
FOREIGN KEY (uid)  REFERENCES Users(uid));

Create table Sell (  
tid		INTEGER,
uid		INTEGER 	NOT NULL,
PRIMARY KEY (tid),
FOREIGN KEY (tid)  REFERENCES Transaction(tid)  ON DELETE CASCADE,
FOREIGN KEY (uid)  REFERENCES Users(uid));

Create table Work_in (  
uid		INTEGER 	NOT NULL,
sid		INTEGER,
PRIMARY KEY (uid),
FOREIGN KEY (uid)  REFERENCES Users(uid)  ON DELETE CASCADE,
FOREIGN KEY (sid)  REFERENCES Store(sid)  ON DELETE CASCADE);

Create table Has (
sid 		INTEGER,
pid 		INTEGER	NOT NULL,
s_inventory	INTEGER,
PRIMARY KEY (sid, pid),
FOREIGN KEY (sid)  REFERENCES Store(sid)       ON DELETE CASCADE, 
FOREIGN KEY (pid)  REFERENCES Product(pid)  ON DELETE CASCADE );


