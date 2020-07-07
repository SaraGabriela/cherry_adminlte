<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transfers Model
 *
 * @property \App\Model\Table\BranchWarehousesTable&\Cake\ORM\Association\BelongsTo $BranchWarehouses
 * @property \App\Model\Table\BranchWarehousesTable&\Cake\ORM\Association\BelongsTo $BranchWarehouses
 * @property \App\Model\Table\TransferFinalCakeTable&\Cake\ORM\Association\HasMany $TransferFinalCake
 * @property \App\Model\Table\TransferProductionRecipesTable&\Cake\ORM\Association\HasMany $TransferProductionRecipes
 * @property \App\Model\Table\TransferWarehouseProductsTable&\Cake\ORM\Association\HasMany $TransferWarehouseProducts
 *
 * @method \App\Model\Entity\Transfer newEmptyEntity()
 * @method \App\Model\Entity\Transfer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transfer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transfer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transfer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transfer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transfer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transfer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransfersTable extends Table
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

        $this->setTable('transfers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('BranchWarehouses', [
            'foreignKey' => 'branch_warehouse_origin_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BranchWarehouses', [
            'foreignKey' => 'branch_warehouse_destiny_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('TransferFinalCake', [
            'foreignKey' => 'transfer_id',
        ]);
        $this->hasMany('TransferProductionRecipes', [
            'foreignKey' => 'transfer_id',
        ]);
        $this->hasMany('TransferWarehouseProducts', [
            'foreignKey' => 'transfer_id',
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
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmptyDateTime('date');

        $validator
            ->scalar('manager')
            ->maxLength('manager', 200)
            ->allowEmptyString('manager');

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
        $rules->add($rules->existsIn(['branch_warehouse_origin_id'], 'BranchWarehouses'));
        $rules->add($rules->existsIn(['branch_warehouse_destiny_id'], 'BranchWarehouses'));

        return $rules;
    }
}
