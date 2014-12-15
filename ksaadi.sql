CREATE TABLE ksaadi_users (
id INTEGER(10) PRIMARY KEY auto_increment,
first_name VARCHAR(50),
last_name VARCHAR(50),
username VARCHAR(50) UNIQUE NOT NULL,
email VARCHAR(50),
password VARCHAR(25) UNIQUE NOT NULL,
admin INTEGER(1) NOT NULL DEFAULT '0'
);


CREATE TABLE `ksaadi_feedback` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `user_id` int(10) DEFAULT NULL,
 `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
 `feedback` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`),
 FOREIGN KEY (user_id) REFERENCES ksaadi_users(id)
);
