CREATE TABLE users (
	id integer PRIMARY KEY AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	login_id varchar(100) NOT NULL,
	password varchar(255) NOT NULL,
	deleted tinyint(1) DEFAULT 0,
	deleted_date datetime,
	logined datetime,
	created datetime,
	updated datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
