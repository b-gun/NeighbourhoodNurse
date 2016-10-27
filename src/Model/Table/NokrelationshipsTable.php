<?php
namespace App\Model\Table;

use App\Model\Entity\Nokrelationship;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nokrelationships Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 */
class NokrelationshipsTable extends Table
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

        $this->table('nokrelationships');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id'
        ]);
    }

    // function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    // {
    //     $entity = $event->data['entity'];
    //     //if (!empty($entity->dob))
    //     //{
    //     echo "entity date is ".$entity->dateofbirth."<br />";
    //     $entity->dateofbirth = $this->dateFormatBeforeSave($entity->dateofbirth);
    //     echo "entity date 2 is ".$entity->dateofbirth."<br />";
    //     //}
    //     return true;
    // }
    

    // function dateFormatBeforeSave($dateString)
    // {
    //     $newDate = explode("/",$dateString);
    //     return $newDate[2]."-".$newDate[1]."-".$newDate[0];
    // }

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
            ->requirePresence('relationship', 'create')
            ->notEmpty('relationship');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('other_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        // $validator
        // ->date('dateofbirth')
        // ->requirePresence('dateofbirth', 'create')
        // ->notEmpty('dateofbirth');


        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->requirePresence('poa', 'create')
            ->notEmpty('poa');

        $validator
            ->integer('home_phone')
            ->allowEmpty('home_phone');

        $validator
            ->integer('work_phone')
            ->allowEmpty('work_phone');

        $validator
            ->integer('mobile_phone')
            ->allowEmpty('mobile_phone');

        $validator
            ->integer('other_phone')
            ->allowEmpty('other_phone');

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        return $rules;
    }
}
