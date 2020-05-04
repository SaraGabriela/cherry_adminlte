<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BranchWarehouses Model
 *
 * @property \App\Model\Table\WarehousesTable&\Cake\ORM\Association\BelongsTo $Warehouses
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\WarehouseProductsTable&\Cake\ORM\Association\HasMany $WarehouseProducts
 *
 * @method \App\Model\Entity\BranchWarehouse newEmptyEntity()
 * @method \App\Model\Entity\BranchWarehouse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BranchWarehouse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BranchWarehouse get($primaryKey, $options = [])
 * @method \App\Model\Entity\BranchWarehouse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BranchWarehouse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BranchWarehouse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BranchWarehouse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BranchWarehouse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BranchWarehouse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BranchWarehouse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BranchWarehouse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BranchWarehouse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BranchWarehousesTable extends Table
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

        $this->setTable('branch_warehouses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Warehouses', [
            'foreignKey' => 'warehouse_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('WarehouseProducts', [
            'foreignKey' => 'branch_warehouse_id',
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
        $rules->add($rules->existsIn(['warehouse_id'], 'Warehouses'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        return $rules;
    }
}
