<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contracts Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ProductionsTable&\Cake\ORM\Association\BelongsTo $Productions
 * @property \App\Model\Table\AlliancesTable&\Cake\ORM\Association\BelongsTo $Alliances
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\ContractRecipesTable&\Cake\ORM\Association\HasMany $ContractRecipes
 *
 * @method \App\Model\Entity\Contract newEmptyEntity()
 * @method \App\Model\Entity\Contract newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contract findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contract|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContractsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contracts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        $this->belongsTo('Productions', [
            'foreignKey' => 'production_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Alliances', [
            'foreignKey' => 'alliance_id',
        ]);
        $this->hasMany('ContractRecipes', [
            'foreignKey' => 'contract_id',
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('order_date')
            ->requirePresence('order_date', 'create')
            ->notEmptyDate('order_date');

        $validator
            ->date('delivery_date')
            ->requirePresence('delivery_date', 'create')
            ->notEmptyDate('delivery_date');

        $validator
            ->decimal('total_price')
            ->requirePresence('total_price', 'create')
            ->notEmptyString('total_price');

        $validator
            ->decimal('account_price')
            ->requirePresence('account_price', 'create')
            ->notEmptyString('account_price');

        $validator
            ->scalar('description')
            ->maxLength('description', 600)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['production_id'], 'Productions'));
        $rules->add($rules->existsIn(['alliance_id'], 'Alliances'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
