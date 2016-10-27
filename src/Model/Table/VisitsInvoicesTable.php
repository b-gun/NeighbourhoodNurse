<?php
namespace App\Model\Table;

use App\Model\Entity\VisitsInvoice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitsInvoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Visits
 * @property \Cake\ORM\Association\BelongsTo $Invoices
 */
class VisitsInvoicesTable extends Table
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

        $this->table('visits_invoices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Visits', [
            'foreignKey' => 'visit_id'
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id'
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
            ->numeric('duration')
            ->allowEmpty('duration');

        $validator
            ->numeric('discount')
            ->allowEmpty('discount');

        $validator
            ->numeric('charge')
            ->allowEmpty('charge');

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
        $rules->add($rules->existsIn(['visit_id'], 'Visits'));
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));
        return $rules;
    }
}
