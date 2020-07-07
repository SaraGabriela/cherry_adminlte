<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecipeDimensions Model
 *
 * @property \App\Model\Table\DimensionsTable&\Cake\ORM\Association\BelongsTo $Dimensions
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\BelongsTo $Recipes
 * @property \App\Model\Table\ProductionRecipesTable&\Cake\ORM\Association\HasMany $ProductionRecipes
 *
 * @method \App\Model\Entity\RecipeDimension newEmptyEntity()
 * @method \App\Model\Entity\RecipeDimension newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeDimension[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeDimension get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecipeDimension findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RecipeDimension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeDimension[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeDimension|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecipeDimension saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecipeDimension[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeDimension[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeDimension[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeDimension[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RecipeDimensionsTable extends Table
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

        $this->setTable('recipe_dimensions');
        $this->setDisplayField('recipe_dimensions_id');
        $this->setPrimaryKey('recipe_dimensions_id');

        $this->belongsTo('Dimensions', [
            'foreignKey' => 'dimension_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Recipes', [
            'foreignKey' => 'recipe_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ProductionRecipes', [
            'foreignKey' => 'recipe_dimension_id',
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
            ->integer('recipe_dimensions_id')
            ->allowEmptyString('recipe_dimensions_id', null, 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

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
        $rules->add($rules->existsIn(['recipe_id'], 'Recipes'));

        return $rules;
    }
}
