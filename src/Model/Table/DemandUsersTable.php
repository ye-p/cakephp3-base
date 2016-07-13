<?php
namespace App\Model\Table;

use App\Model\Entity\DemandUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DemandUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Logins
 */
class DemandUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('demand_users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Logins', [
            'foreignKey' => 'login_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('zip');

        $validator
            ->allowEmpty('prefecture');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('address_1');

        $validator
            ->allowEmpty('address_2');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('name_kana');

        $validator
            ->integer('tel_type')
            ->allowEmpty('tel_type');

        $validator
            ->allowEmpty('tel');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

        $validator
            ->boolean('edit_flag')
            ->allowEmpty('edit_flag');

        $validator
            ->boolean('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmpty('deleted_date');

        $validator
            ->boolean('mail_authenticate_flag')
            ->allowEmpty('mail_authenticate_flag');

        $validator
            ->allowEmpty('tmp_pw');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['login_id'], 'Logins'));
        return $rules;
    }
}
