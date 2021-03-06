<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PreparationProducts Model
 *
 * @property \App\Model\Table\PreviousPreparationsTable&\Cake\ORM\Association\BelongsTo $PreviousPreparations
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\PreparationProduct newEmptyEntity()
 * @method \App\Model\Entity\PreparationProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PreparationProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PreparationProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PreparationProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PreparationProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PreparationProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PreparationProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PreparationProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PreparationProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreparationProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreparationProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreparationProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PreparationProductsTable extends Table
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

        $this->setTable('preparation_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PreviousPreparations', [
            'foreignKey' => 'previous_preparation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 50)
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
        $rules->add($rules->existsIn(['previous_preparation_id'], 'PreviousPreparations'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
