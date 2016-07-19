<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Validation;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Logins
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Logins', [
            'foreignKey' => 'login_id',
            'joinType' => 'INNER'
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
        $validator->provider('ProviderKey', 'App\Model\Validation\CustomValidation');

        $notPassword = function ($context) {return !empty($context['data']['password']);};
        $notLoginId = function ($context) {return !empty($context['data']['login_id']);};
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'ruleName', [
                'rule' => ['alphaNumericCustom'],
                'provider' => 'ProviderKey',
                'message' => '名前は半角英数字で入力してください。']
            );

        $validator
            ->requirePresence('password', $notPassword)
            ->notEmpty('password');

        $validator
            ->requirePresence('login_id', $notLoginId)
            ->notEmpty('login_id');

        $validator
            ->boolean('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmpty('deleted_date');

        $validator
            ->dateTime('logined')
            ->allowEmpty('logined');

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
        return $rules;
    }
}
