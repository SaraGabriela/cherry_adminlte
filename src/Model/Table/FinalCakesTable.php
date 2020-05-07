<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FinalCakes Model
 *
 * @property \App\Model\Table\CakesTable&\Cake\ORM\Association\BelongsTo $Cakes
 * @property \App\Model\Table\ProductionRecipesTable&\Cake\ORM\Association\BelongsTo $ProductionRecipes
 * @property \App\Model\Table\TransformationsTable&\Cake\ORM\Association\HasMany $Transformations
 *
 * @method \App\Model\Entity\FinalCake newEmptyEntity()
 * @method \App\Model\Entity\FinalCake newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FinalCake[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FinalCake get($primaryKey, $options = [])
 * @method \App\Model\Entity\FinalCake findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FinalCake patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FinalCake[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FinalCake|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinalCake saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinalCake[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinalCake[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinalCake[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinalCake[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FinalCakesTable extends Table
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

        $this->setTable('final_cakes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cakes', [
            'foreignKey' => 'cake_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductionRecipes', [
            'foreignKey' => 'production_recipe_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Transformations', [
            'foreignKey' => 'final_cake_id',
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
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->date('arrival_date')
            ->requirePresence('arrival_date', 'create')
            ->notEmptyDate('arrival_date');

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
        $rules->add($rules->existsIn(['cake_id'], 'Cakes'));
        $rules->add($rules->existsIn(['production_recipe_id'], 'ProductionRecipes'));

        return $rules;
    }
}
