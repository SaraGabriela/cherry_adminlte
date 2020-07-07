<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdrecipeDetails Model
 *
 * @property \App\Model\Table\ProductionRecipesTable&\Cake\ORM\Association\BelongsTo $ProductionRecipes
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\TransformationsTable&\Cake\ORM\Association\HasMany $Transformations
 *
 * @method \App\Model\Entity\ProdrecipeDetail newEmptyEntity()
 * @method \App\Model\Entity\ProdrecipeDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProdrecipeDetailsTable extends Table
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

        $this->setTable('prodrecipe_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProductionRecipes', [
            'foreignKey' => 'production_recipe_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Transformations', [
            'foreignKey' => 'prodrecipe_detail_id',
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
            ->scalar('priority')
            ->requirePresence('priority', 'create')
            ->notEmptyString('priority');

        $validator
            ->integer('branch')
            ->requirePresence('branch', 'create')
            ->notEmptyString('branch');

        $validator
            ->scalar('observations')
            ->maxLength('observations', 600)
            ->requirePresence('observations', 'create')
            ->notEmptyString('observations');

        $validator
            ->scalar('phase')
            ->maxLength('phase', 50)
            ->requirePresence('phase', 'create')
            ->notEmptyString('phase');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['production_recipe_id'], 'ProductionRecipes'));
        $rules->add($rules->existsIn(['branch'], 'Branches'));
        return $rules;
    }
}
