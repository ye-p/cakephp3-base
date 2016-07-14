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

INSERT INTO users (name,login_id,password,created) VALUES ('テスト太郎','j3ns6','edc6e3fc925cff497471f4b4b66616dae8f1bc475ccefb18af01422bc65db528',NOW());
