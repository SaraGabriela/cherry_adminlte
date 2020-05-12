<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Warehouses Model
 *
 * @property \App\Model\Table\BranchWarehousesTable&\Cake\ORM\Association\HasMany $BranchWarehouses
 * @property \App\Model\Table\PurchaseProductsTable&\Cake\ORM\Association\HasMany $PurchaseProducts
 *
 * @method \App\Model\Entity\Warehouse newEmptyEntity()
 * @method \App\Model\Entity\Warehouse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Warehouse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Warehouse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warehouse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WarehousesTable extends Table
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

        $this->setTable('warehouses');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->hasMany('BranchWarehouses', [
            'foreignKey' => 'warehouse_id',
        ]);
        $this->hasMany('PurchaseProducts', [
            'foreignKey' => 'warehouse_id',
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
            ->scalar('type')
            ->maxLength('type', 200)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}
