<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DecorationDimensions Model
 *
 * @property \App\Model\Table\DecorationsTable&\Cake\ORM\Association\BelongsTo $Decorations
 * @property \App\Model\Table\DimensionsTable&\Cake\ORM\Association\BelongsTo $Dimensions
 * @property \App\Model\Table\DecorationProductMeasuresTable&\Cake\ORM\Association\HasMany $DecorationProductMeasures
 *
 * @method \App\Model\Entity\DecorationDimension newEmptyEntity()
 * @method \App\Model\Entity\DecorationDimension newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationDimension[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationDimension get($primaryKey, $options = [])
 * @method \App\Model\Entity\DecorationDimension findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DecorationDimension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationDimension[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationDimension|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationDimension saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationDimension[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationDimension[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationDimension[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationDimension[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DecorationDimensionsTable extends Table
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

        $this->setTable('decoration_dimensions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Decorations', [
            'foreignKey' => 'decoration_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dimensions', [
            'foreignKey' => 'dimension_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DecorationProductMeasures', [
            'foreignKey' => 'decoration_dimension_id',
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
        $rules->add($rules->existsIn(['decoration_id'], 'Decorations'));
        $rules->add($rules->existsIn(['dimension_id'], 'Dimensions'));

        return $rules;
    }
}
