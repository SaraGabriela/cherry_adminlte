<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FillingProductMeasures Model
 *
 * @property \App\Model\Table\FillingProductsTable&\Cake\ORM\Association\BelongsTo $FillingProducts
 * @property \App\Model\Table\FillingDimensionsTable&\Cake\ORM\Association\BelongsTo $FillingDimensions
 *
 * @method \App\Model\Entity\FillingProductMeasure newEmptyEntity()
 * @method \App\Model\Entity\FillingProductMeasure newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FillingProductMeasure get($primaryKey, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FillingProductMeasure|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProductMeasure[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FillingProductMeasuresTable extends Table
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

        $this->setTable('filling_product_measures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FillingProducts', [
            'foreignKey' => 'filling_product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('FillingDimensions', [
            'foreignKey' => 'filling_dimension_id',
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
        $rules->add($rules->existsIn(['filling_product_id'], 'FillingProducts'));
        $rules->add($rules->existsIn(['filling_dimension_id'], 'FillingDimensions'));

        return $rules;
    }
}
