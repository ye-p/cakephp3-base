DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS logs;

CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `login_id` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `group_id` INT(11) NOT NULL,
    `created` DATETIME,
    `modified` DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `groups` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `created` DATETIME,
    `modified` DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `logs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT(11),
    `ip` VARCHAR(20),
    `controller` VARCHAR(255),
    `action` VARCHAR(255),
    `url` VARCHAR(255),
    `created` DATETIME
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DELETE FROM users;
DELETE FROM groups;
DELETE FROM aros;
DELETE FROM aros_acos;

INSERT INTO groups (name,created) VALUES ('スーパー管理者',NOW());
INSERT INTO groups (name,created) VALUES ('サブ管理者',NOW());

INSERT INTO users (username,login_id,password,group_id,created) VALUES ('スーパー管理者さん', 'super','$2y$10$VpYVQXfPUCcm3KHNBSF9SO7xeaeFzI94i/EgwYiOIWjVqJrwg.sMW', (select id from groups where name = 'スーパー管理者'), NOW());
INSERT INTO users (username,login_id,password,group_id,created) VALUES ('サブ管理者さん', 'sub','$2y$10$VpYVQXfPUCcm3KHNBSF9SO7xeaeFzI94i/EgwYiOIWjVqJrwg.sMW', (select id from groups where name = 'サブ管理者'), NOW());

INSERT INTO aros (model,foreign_key,lft,rght) VALUES ('Groups', (select id from groups where name = 'スーパー管理者'), 1, 2);
INSERT INTO aros (model,foreign_key,parent_id,lft,rght) VALUES ('Users', (select id from users where username = 'スーパー管理者さん'), (select id from aros as tmp where foreign_key in (select id from groups where name = 'スーパー管理者') and model = 'Groups'), 3, 4);
INSERT INTO aros (model,foreign_key,lft,rght) VALUES ('Groups', (select id from groups where name = 'サブ管理者'), 5, 6);
INSERT INTO aros (model,foreign_key,parent_id,lft,rght) VALUES ('Users', (select id from users where username = 'サブ管理者さん'), (select id from aros as tmp where foreign_key in (select id from groups where name = 'サブ管理者') and model = 'Groups'), 7, 8);


INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from groups where name = 'スーパー管理者') and model = 'Groups'),(select id from acos where alias = 'App'),1,1,1,1);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from users where username = 'スーパー管理者さん') and model = 'Users'),(select id from acos where alias = 'App'),1,1,1,1);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from groups where name = 'サブ管理者') and model = 'Groups'),(select id from acos where alias = 'Menu'),1,1,1,1);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from groups where name = 'サブ管理者') and model = 'Groups'),(select id from acos where alias = 'next'),'-1','-1','-1','-1');
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from groups where name = 'サブ管理者') and model = 'Groups'),(select id from acos where alias = 'mail'),'-1','-1','-1','-1');
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from users where username = 'サブ管理者さん') and model = 'Users'),(select id from acos where alias = 'Menu'),1,1,1,1);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from users where username = 'サブ管理者さん') and model = 'Users'),(select id from acos where alias = 'next'),'-1','-1','-1','-1');
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from users where username = 'サブ管理者さん') and model = 'Users'),(select id from acos where alias = 'mail'),'-1','-1','-1','-1');
