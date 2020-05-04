<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecipeProductMeasures Model
 *
 * @property \App\Model\Table\RawProductsTable&\Cake\ORM\Association\BelongsTo $RawProducts
 * @property \App\Model\Table\RawRecipesTable&\Cake\ORM\Association\BelongsTo $RawRecipes
 *
 * @method \App\Model\Entity\RecipeProductMeasure newEmptyEntity()
 * @method \App\Model\Entity\RecipeProductMeasure newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RecipeProductMeasure[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RecipeProductMeasuresTable extends Table
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

        $this->setTable('recipe_product_measures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('RawProducts', [
            'foreignKey' => 'raw_product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RawRecipes', [
            'foreignKey' => 'raw_recipe_id',
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
        $rules->add($rules->existsIn(['raw_product_id'], 'RawProducts'));
        $rules->add($rules->existsIn(['raw_recipe_id'], 'RawRecipes'));

        return $rules;
    }
}
