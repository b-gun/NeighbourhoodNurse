<?php
namespace App\Model\Table;

use App\Model\Entity\DiseaseSpecific;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiseaseSpecifics Model
 *
 */
class DiseaseSpecificsTable extends Table
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

        $this->table('disease_specifics');
        $this->displayField('name');
        $this->primaryKey('id');
        
        $this->belongsTo('Diseases', [
            'foreignKey' => 'disease_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('comment');

        $validator
            ->allowEmpty('code1');

        $validator
            ->allowEmpty('code2');

        return $validator;
    }
}
