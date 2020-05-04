<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RawRecipes Model
 *
 * @property \App\Model\Table\RecipeProductMeasuresTable&\Cake\ORM\Association\HasMany $RecipeProductMeasures
 *
 * @method \App\Model\Entity\RawRecipe newEmptyEntity()
 * @method \App\Model\Entity\RawRecipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RawRecipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RawRecipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\RawRecipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RawRecipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RawRecipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RawRecipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawRecipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawRecipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawRecipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawRecipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawRecipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RawRecipesTable extends Table
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

        $this->setTable('raw_recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('RecipeProductMeasures', [
            'foreignKey' => 'raw_recipe_id',
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
            ->decimal('recipes_quantity')
            ->requirePresence('recipes_quantity', 'create')
            ->notEmptyString('recipes_quantity');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 150)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

        return $validator;
    }
}
