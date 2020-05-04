<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DecorationProductMeasures Model
 *
 * @property \App\Model\Table\DecorationDimensionsTable&\Cake\ORM\Association\BelongsTo $DecorationDimensions
 * @property \App\Model\Table\DecorationProductsTable&\Cake\ORM\Association\BelongsTo $DecorationProducts
 *
 * @method \App\Model\Entity\DecorationProductMeasure newEmptyEntity()
 * @method \App\Model\Entity\DecorationProductMeasure newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure get($primaryKey, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProductMeasure[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DecorationProductMeasuresTable extends Table
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

        $this->setTable('decoration_product_measures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DecorationDimensions', [
            'foreignKey' => 'decoration_dimension_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('DecorationProducts', [
            'foreignKey' => 'decoration_product_id',
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
        $rules->add($rules->existsIn(['decoration_dimension_id'], 'DecorationDimensions'));
        $rules->add($rules->existsIn(['decoration_product_id'], 'DecorationProducts'));

        return $rules;
    }
}
