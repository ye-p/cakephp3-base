<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DemandUsersFixture
 *
 */
class DemandUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ID', 'autoIncrement' => true, 'precision' => null],
        'zip' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => 'ご使用場所_郵便番号', 'precision' => null, 'fixed' => null],
        'prefecture' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'comment' => '都道府県', 'precision' => null, 'fixed' => null],
        'city' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => 'ご使用場所_市区町村', 'precision' => null, 'fixed' => null],
        'address_1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => 'ご使用場所_住所', 'precision' => null, 'fixed' => null],
        'address_2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => 'ご使用場所_建物名', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '氏名', 'precision' => null, 'fixed' => null],
        'name_kana' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '氏名（カナ）', 'precision' => null, 'fixed' => null],
        'tel_type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '電話番号区分', 'precision' => null, 'autoIncrement' => null],
        'tel' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => 'ログインメールアドレス', 'precision' => null, 'fixed' => null],
        'login_id' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => 'パスワード', 'precision' => null, 'fixed' => null],
        'edit_flag' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '１：変更状態', 'precision' => null],
        'deleted' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '削除フラグ', 'precision' => null],
        'deleted_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '削除日時', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '登録日時', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '更新日時', 'precision' => null],
        'mail_authenticate_flag' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => 'メール認証フラグ(0:未認証,1:認証済み)', 'precision' => null],
        'tmp_pw' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'zip' => 'Lorem ipsum dolor sit amet',
            'prefecture' => 'Lorem ipsum dolor ',
            'city' => 'Lorem ipsum dolor sit amet',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'name_kana' => 'Lorem ipsum dolor sit amet',
            'tel_type' => 1,
            'tel' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'login_id' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'edit_flag' => 1,
            'deleted' => 1,
            'deleted_date' => '2016-06-22 05:40:31',
            'created' => '2016-06-22 05:40:31',
            'modified' => '2016-06-22 05:40:31',
            'mail_authenticate_flag' => 1,
            'tmp_pw' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
