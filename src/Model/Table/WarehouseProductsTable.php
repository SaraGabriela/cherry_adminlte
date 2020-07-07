<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WarehouseProducts Model
 *
 * @property \App\Model\Table\BranchWarehousesTable&\Cake\ORM\Association\BelongsTo $BranchWarehouses
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\TransferWarehouseProductsTable&\Cake\ORM\Association\HasMany $TransferWarehouseProducts
 *
 * @method \App\Model\Entity\WarehouseProduct newEmptyEntity()
 * @method \App\Model\Entity\WarehouseProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\WarehouseProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WarehouseProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\WarehouseProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\WarehouseProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WarehouseProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WarehouseProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WarehouseProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WarehouseProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WarehouseProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\WarehouseProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WarehouseProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WarehouseProductsTable extends Table
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

        $this->setTable('warehouse_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('BranchWarehouses', [
            'foreignKey' => 'branch_warehouse_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('TransferWarehouseProducts', [
            'foreignKey' => 'warehouse_product_id',
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
            ->numeric('current_stock')
            ->requirePresence('current_stock', 'create')
            ->notEmptyString('current_stock');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 50)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->integer('previous_stock')
            ->requirePresence('previous_stock', 'create')
            ->notEmptyString('previous_stock');

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
        $rules->add($rules->existsIn(['branch_warehouse_id'], 'BranchWarehouses'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
