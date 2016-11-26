CREATE DABABASE registration;

/* 
WITHOUT THE DATE VARIABLES
USE THIS ONE FOR NOW
*/

CREATE TABLE voter (
	fname VARCHAR(35) NOT NULL,
	mname VARCHAR(35),
	lname VARCHAR(35) NOT NULL,
	sname VARCHAR(10),
	dob VARCHAR(15) NOT NULL,

	dlnum VARCHAR(15) NOT NULL,
	dlissdate VARCHAR(15) NOT NULL,
	dlexpdate VARCHAR(15) 	NOT NULL,
	dladdress VARCHAR(50) 	NOT NULL, 

	curradd	 VARCHAR(50) 	NOT NULL,
	telenum VARCHAR(50),
	email VARCHAR(75),

	voterid INT(8) NOT NULL auto_increment,
	PRIMARY KEY (voterid)
);


/* WITH THE DATE VARIABLES*/

CREATE TABLE voter (
	fname VARCHAR(35) NOT NULL,
	mname VARCHAR(35),
	lname VARCHAR(35) NOT NULL,
	sname VARCHAR(10),
	dob DATE,

	dlnum VARCHAR(15) NOT NULL,
	dlissdate DATE NOT NULL,
	dlexpdate DATE 	NOT NULL,
	dladdress VARCHAR(50) 	NOT NULL, 

	curradd	 VARCHAR(50) 	NOT NULL,
	telenum VARCHAR(50),
	email VARCHAR(75),

	voterid INT(8) NOT NULL auto_increment,
	PRIMARY KEY (voterid)
);
