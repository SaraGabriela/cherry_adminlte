<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductionRecipes Model
 *
 * @property \App\Model\Table\ProductionsTable&\Cake\ORM\Association\BelongsTo $Productions
 * @property \App\Model\Table\RecipeDimensionsTable&\Cake\ORM\Association\BelongsTo $RecipeDimensions
 * @property \App\Model\Table\FinalCakesTable&\Cake\ORM\Association\HasMany $FinalCakes
 * @property \App\Model\Table\ProdrecipeDetailsTable&\Cake\ORM\Association\HasMany $ProdrecipeDetails
 *
 * @method \App\Model\Entity\ProductionRecipe newEmptyEntity()
 * @method \App\Model\Entity\ProductionRecipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductionRecipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductionRecipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductionRecipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductionRecipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductionRecipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductionRecipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductionRecipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductionRecipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductionRecipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductionRecipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductionRecipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductionRecipesTable extends Table
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

        $this->setTable('production_recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Productions', [
            'foreignKey' => 'production_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RecipeDimensions', [
            'foreignKey' => 'recipe_dimension_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FinalCakes', [
            'foreignKey' => 'production_recipe_id',
        ]);
        $this->hasMany('ProdrecipeDetails', [
            'foreignKey' => 'production_recipe_id',
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
        $rules->add($rules->existsIn(['production_id'], 'Productions'));
        $rules->add($rules->existsIn(['recipe_dimension_id'], 'RecipeDimensions'));

        return $rules;
    }
}
