CREATE TABLE ksaadi_users (
id INTEGER(10) PRIMARY KEY auto_increment,
first_name VARCHAR(50),
last_name VARCHAR(50),
username VARCHAR(50) UNIQUE NOT NULL,
email VARCHAR(50),
password VARCHAR(25) UNIQUE NOT NULL,
admin INTEGER(1) NOT NULL DEFAULT '0'
);
