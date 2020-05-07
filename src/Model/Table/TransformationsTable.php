<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transformations Model
 *
 * @property \App\Model\Table\FinalCakesTable&\Cake\ORM\Association\BelongsTo $FinalCakes
 * @property \App\Model\Table\ProdrecipeDetailsTable&\Cake\ORM\Association\BelongsTo $ProdrecipeDetails
 *
 * @method \App\Model\Entity\Transformation newEmptyEntity()
 * @method \App\Model\Entity\Transformation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transformation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transformation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transformation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transformation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transformation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transformation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transformation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transformation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transformation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transformation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transformation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransformationsTable extends Table
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

        $this->setTable('transformations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('FinalCakes', [
            'foreignKey' => 'final_cake_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProdrecipeDetails', [
            'foreignKey' => 'prodrecipe_detail_id',
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
            ->integer('recipe')
            ->requirePresence('recipe', 'create')
            ->notEmptyString('recipe');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('detail')
            ->maxLength('detail', 600)
            ->requirePresence('detail', 'create')
            ->notEmptyString('detail');

        $validator
            ->integer('phase')
            ->requirePresence('phase', 'create')
            ->notEmptyString('phase');

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
        $rules->add($rules->existsIn(['final_cake_id'], 'FinalCakes'));
        $rules->add($rules->existsIn(['prodrecipe_detail_id'], 'ProdrecipeDetails'));

        return $rules;
    }
}
