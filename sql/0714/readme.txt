実行手順

1. ACL用テーブルを作成する下記コマンドを実行後にSQLを流すこと
 $ bin/cake Migrations.migrations migrate -p Acl
 $ bin/cake acl_extras aco_sync

2. サンプルデータ作成
 $ mysql -uユーザ名 -p DB名 < sql/0714/create_uses_table.sql


※ 画面を新たに作成した場合は下記コマンドAcosテーブルの更新を行う必要がある。
 $ bin/cake acl_extras aco_sync
