<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Auth\CustomPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $login_id
 * @property \App\Model\Entity\Login $login
 * @property string $password
 * @property bool $deleted
 * @property \Cake\I18n\Time $deleted_date
 * @property \Cake\I18n\Time $logined
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new CustomPasswordHasher)->hash($password);
    }

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $group_id = $this->group_id;
        } else {
            $users_table = TableRegistry::get('Users');
            $user = $users_table->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $group_id = $user->group_id;
        }
        if (!$group_id) {
            return null;
        }

        return ['Groups' => ['id' => $group_id]];
    }
}
