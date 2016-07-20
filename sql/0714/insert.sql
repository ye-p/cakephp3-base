DELETE FROM users;
DELETE FROM groups;
DELETE FROM aros;
DELETE FROM aros_acos;

INSERT INTO groups (name,created) VALUES ('スーパー管理者',NOW());
INSERT INTO users (username,login_id,password,group_id,created) VALUES ('スーパー管理者さん', 'super','$2y$10$VpYVQXfPUCcm3KHNBSF9SO7xeaeFzI94i/EgwYiOIWjVqJrwg.sMW', (select id from groups where name = 'スーパー管理者'), NOW());
INSERT INTO aros (model,foreign_key,lft,rght) VALUES ('Groups', (select id from groups where name = 'スーパー管理者'), 1, 2);
INSERT INTO aros (model,foreign_key,lft,rght) VALUES ('Users', (select id from users where username = 'スーパー管理者さん'), 3, 4);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from groups where name = 'スーパー管理者') and model = 'Groups'),(select id from acos where alias = 'App'),1,1,1,1);
INSERT INTO aros_acos (aro_id,aco_id,_create,_read,_update,_delete) VALUES ((select id from aros where foreign_key in (select id from users where username = 'スーパー管理者さん') and model = 'Users'),(select id from acos where alias = 'App'),1,1,1,1);
