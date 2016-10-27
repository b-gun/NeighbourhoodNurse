<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Referrers Model
 *
 * @property \Cake\ORM\Association\HasMany $Patients
 * @property \Cake\ORM\Association\HasMany $Refcontacts
 *
 * @method \App\Model\Entity\Referrer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Referrer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Referrer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Referrer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Referrer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Referrer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Referrer findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReferrersTable extends Table
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

        $this->table('referrers');
        $this->displayField('business_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Patients', [
            'foreignKey' => 'referrer_id'
        ]);
        $this->hasMany('Refcontacts', [
            'foreignKey' => 'referrer_id'
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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->allowEmpty('business_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->integer('phone')
            ->allowEmpty('phone');

        $validator
            ->integer('fax_phone')
            ->allowEmpty('fax_phone');

        $validator
            ->requirePresence('address1', 'create')
            ->notEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            ->requirePresence('suburb', 'create')
            ->notEmpty('suburb');

        $validator
            ->integer('postcode')
            ->requirePresence('postcode', 'create')
            ->notEmpty('postcode');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

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

        return $rules;
    }
}
