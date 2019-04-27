CREATE TABLE admin(
	admin_id VARCHAR(15)  NOT NULL,
	aname    VARCHAR(50)   NOT NULL,
	apwd     VARCHAR(7) NOT NULL,
	amobile CHAR(10) NOT NULL,
	UNIQUE(admin_id),
	PRIMARY KEY(admin_id)
);
CREATE TABLE branch(
	source VARCHAR(200)  NOT NULL,
	destination VARCHAR(200) NOT NULL,
	distance  INT NOT NULL
);
CREATE TABLE branch_mgr(
	bid VARCHAR(15)  NOT NULL,
	bmpwd VARCHAR(10) NOT NULL,
	bmname VARCHAR(15)  NOT NULL,
	bmdob DATE NOT NULL,
	bmphone CHAR(10) NOT NULL,
	bmmail VARCHAR(100) NOT NULL,
	bmaddress VARCHAR(100) NOT NULL,
	bmsalary DECIMAL(10,1) NOT NULL,
	bcity VARCHAR(30) NOT NULL,
	UNIQUE(bid),
	PRIMARY KEY(bid)
);
CREATE TABLE customer(
	cid VARCHAR(50) NOT NULL,
	cname VARCHAR(40) NOT NULL,
	cpno CHAR(10) NOT NULL,
	cmail VARCHAR(50) NOT NULL,
	cpwd  VARCHAR(10) NOT NULL,
	PRIMARY KEY(cid),
	UNIQUE(cid)
);
CREATE TABLE booking(
	custid VARCHAR(50) NOT NULL,
	consid VARCHAR(14) PRIMARY KEY NOT NULL,
	csender VARCHAR(50) NOT NULL,
	cspno CHAR(10) NOT NULL,
	csaddress VARCHAR(100) NOT NULL,
	csource VARCHAR(100) NOT NULL,
	creceiver VARCHAR(100) NOT NULL,
	crpno CHAR(10) NOT NULL,
	craddress VARCHAR(100) NOT NULL,
	cdest VARCHAR(100) NOT NULL,
	cweight INT NOT NULL,
	camount INT NOT NULL,
	cdob DATE NOT NULL,
	UNIQUE (consid),
	FOREIGN KEY (custid) REFERENCES customer(cid)
);
CREATE TABLE staff(
  staff_id  VARCHAR(10) NOT NULL,
  st_name VARCHAR(50) NOT NULL,
  stpno CHAR(10) NOT NULL,
  stadd VARCHAR(100) NOT NULL,
  stsalary DECIMAL(10,1) NOT NULL,
  st_city VARCHAR(100) NOT NULL,
  avail VARCHAR,
  no_of_del INT NOT NULL,
  UNIQUE(staff_id),
  PRIMARY KEY (staff_id)
);
CREATE TABLE updatecourier(
	courid VARCHAR(50) NOT NULL,
	consgid VARCHAR(15) NOT NULL,
	cosource VARCHAR(100) NOT NULL,
	codest VARCHAR(100) NOT NULL,
	currloc VARCHAR(50) NOT NULL,
	status VARCHAR(100) NOT NULL,
	deldate DATE NOT NULL,
	cdel VARCHAR(50),
	cdname VARCHAR(100),
	cdpno CHAR(10),
	PRIMARY KEY (consgid),
	FOREIGN KEY (courid) REFERENCES customer(cid),
	FOREIGN KEY(consgid) REFERENCES booking(consid)
);
CREATE TABLE deliver(
	delid VARCHAR(50) NOT NULL,
	consdel VARCHAR(50) NOT NULL,
	deldate DATE NOT NULL,
	stdel VARCHAR(80) NOT NULL,
	action VARCHAR(15),
	PRIMARY KEY(delid,consdel),
	FOREIGN KEY(delid) REFERENCES customer(cid),
	FOREIGN KEY (consdel) REFERENCES booking(consid)
);
CREATE TABLE review(
	rid VARCHAR(50) NOT NULL,
	rname VARCHAR(30)  NOT NULL,
	rpno CHAR(10) NOT NULL,
	comments VARCHAR(300) NOT NULL,
	FOREIGN KEY (rid) REFERENCES customer(cid)
);
CREATE TABLE login(
	lid VARCHAR(50) NOT NULL,
	lpwd VARCHAR(10) NOT NULL
);