<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;
use Cake\Event\Event;

/**
 * Patients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Referrers
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientsTable extends Table
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

        $this->table('patients');
        $this->displayField('full_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Referrers', [
            'foreignKey' => 'referrer_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Visits', [
            'foreignKey' => 'patient_id'
        ]);
         $this->hasMany('Nokrelationships', [
            'foreignKey' => 'patient_id'
        ]);

        $this->belongsToMany('Diseases',[
            'foreignKey' => 'patient_id',
            'targetForeignKey' => 'disease_id',
            'joinTable' => 'patients_diseases'
        ]);
    }

    function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $entity = $event->data['entity'];
        //if (!empty($entity->dob))
        //{
        echo "entity date is ".$entity->dateofbirth."<br />";
        $entity->dateofbirth = $this->dateFormatBeforeSave($entity->dateofbirth);
        echo "entity date 2 is ".$entity->dateofbirth."<br />";
        //}
        return true;
    }

    function dateFormatBeforeSave($dateString)
    {
        $newDate = explode("/",$dateString);
        return $newDate[2]."-".$newDate[1]."-".$newDate[0];
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
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('other_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

       // $validator
        //    ->date('dateofbirth')
         //   ->requirePresence('dateofbirth', 'create')
          //  ->notEmpty('dateofbirth');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');
            
        $validator
            ->integer('phone')
            ->allowEmpty('phone');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['referrer_id'], 'Referrers'));

        return $rules;
    }
}
