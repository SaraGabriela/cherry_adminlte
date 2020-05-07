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
 * @property \App\Model\Table\BranchWarehousesTable&\Cake\ORM\Association\BelongsTo $BranchWarehouses
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
        $this->belongsTo('BranchWarehouses', [
            'foreignKey' => 'branch_warehouse_id',
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
            ->integer('cake_phase')
            ->requirePresence('cake_phase', 'create')
            ->notEmptyString('cake_phase');

        $validator
            ->scalar('current_ubication')
            ->maxLength('current_ubication', 250)
            ->requirePresence('current_ubication', 'create')
            ->notEmptyString('current_ubication');

        $validator
            ->boolean('special_order')
            ->notEmptyString('special_order');

        $validator
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmptyString('priority');

        $validator
            ->scalar('branch')
            ->maxLength('branch', 250)
            ->requirePresence('branch', 'create')
            ->notEmptyString('branch');

        $validator
            ->scalar('observations')
            ->maxLength('observations', 600)
            ->requirePresence('observations', 'create')
            ->notEmptyString('observations');

        $validator
            ->date('date_phase_change')
            ->requirePresence('date_phase_change', 'create')
            ->notEmptyDate('date_phase_change');

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
        $rules->add($rules->existsIn(['branch_warehouse_id'], 'BranchWarehouses'));

        return $rules;
    }
}
