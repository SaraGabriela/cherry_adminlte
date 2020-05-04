<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recipes Model
 *
 * @property \App\Model\Table\DimensionsTable&\Cake\ORM\Association\BelongsTo $Dimensions
 * @property \App\Model\Table\RawsTable&\Cake\ORM\Association\BelongsTo $Raws
 * @property \App\Model\Table\RawFillingsTable&\Cake\ORM\Association\BelongsTo $RawFillings
 * @property \App\Model\Table\DecorationsTable&\Cake\ORM\Association\BelongsTo $Decorations
 * @property \App\Model\Table\CakesTable&\Cake\ORM\Association\BelongsTo $Cakes
 *
 * @method \App\Model\Entity\Recipe newEmptyEntity()
 * @method \App\Model\Entity\Recipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Recipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RecipesTable extends Table
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

        $this->setTable('recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dimensions', [
            'foreignKey' => 'dimension_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RawFillings', [
            'foreignKey' => 'raw_filling_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Decorations', [
            'foreignKey' => 'decoration_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cakes', [
            'foreignKey' => 'cake_id',
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
            ->scalar('cooking_time')
            ->maxLength('cooking_time', 150)
            ->allowEmptyString('cooking_time');

        $validator
            ->scalar('special_order')
            ->maxLength('special_order', 5)
            ->requirePresence('special_order', 'create')
            ->notEmptyString('special_order');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('observations')
            ->maxLength('observations', 450)
            ->allowEmptyString('observations');

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
        $rules->add($rules->existsIn(['dimension_id'], 'Dimensions'));
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));
        $rules->add($rules->existsIn(['raw_filling_id'], 'RawFillings'));
        $rules->add($rules->existsIn(['decoration_id'], 'Decorations'));
        $rules->add($rules->existsIn(['cake_id'], 'Cakes'));

        return $rules;
    }
}
