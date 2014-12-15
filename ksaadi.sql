CREATE TABLE ksaadi_users (
id INTEGER(10) PRIMARY KEY auto_increment,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
username VARCHAR(50) UNIQUE NOT NULL,
email VARCHAR(50)NOT NULL,
password VARCHAR(41) NOT NULL,
admin INTEGER(1) NOT NULL DEFAULT '0'
);


CREATE TABLE `ksaadi_feedback` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `user_id` int(10) NOT NULL REFERENCES ksaadi_users(id),
 `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
 `feedback` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
);

INSERT INTO `ksaadi_users`(`first_name`, `last_name`, `username`, `email`, `password`, `admin`) VALUES ('Kaire','Saadi','kaire','kaire.saadi@gmail.com','b9826cfcb8be9c90ba1b0adb1219c39efffd98c7',1);
