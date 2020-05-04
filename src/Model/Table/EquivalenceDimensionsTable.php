<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EquivalenceDimensions Model
 *
 * @property \App\Model\Table\EquivalencesTable&\Cake\ORM\Association\BelongsTo $Equivalences
 * @property \App\Model\Table\DimensionsTable&\Cake\ORM\Association\BelongsTo $Dimensions
 *
 * @method \App\Model\Entity\EquivalenceDimension newEmptyEntity()
 * @method \App\Model\Entity\EquivalenceDimension newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EquivalenceDimension get($primaryKey, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EquivalenceDimension|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EquivalenceDimension[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EquivalenceDimensionsTable extends Table
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

        $this->setTable('equivalence_dimensions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Equivalences', [
            'foreignKey' => 'equivalence_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Dimensions', [
            'foreignKey' => 'dimension_id',
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
            ->decimal('quantity_recipes')
            ->requirePresence('quantity_recipes', 'create')
            ->notEmptyString('quantity_recipes');

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
        $rules->add($rules->existsIn(['equivalence_id'], 'Equivalences'));
        $rules->add($rules->existsIn(['dimension_id'], 'Dimensions'));

        return $rules;
    }
}
