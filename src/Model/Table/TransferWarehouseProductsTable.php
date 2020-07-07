<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransferWarehouseProducts Model
 *
 * @property \App\Model\Table\WarehouseProductsTable&\Cake\ORM\Association\BelongsTo $WarehouseProducts
 * @property \App\Model\Table\TransfersTable&\Cake\ORM\Association\BelongsTo $Transfers
 *
 * @method \App\Model\Entity\TransferWarehouseProduct newEmptyEntity()
 * @method \App\Model\Entity\TransferWarehouseProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransferWarehouseProductsTable extends Table
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

        $this->setTable('transfer_warehouse_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('WarehouseProducts', [
            'foreignKey' => 'warehouse_product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Transfers', [
            'foreignKey' => 'transfer_id',
            'joinType' => 'INNER',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 100)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

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
        $rules->add($rules->existsIn(['warehouse_product_id'], 'WarehouseProducts'));
        $rules->add($rules->existsIn(['transfer_id'], 'Transfers'));

        return $rules;
    }
}
