<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productions Model
 *
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\ProductionRecipesTable&\Cake\ORM\Association\HasMany $ProductionRecipes
 *
 * @method \App\Model\Entity\Production newEmptyEntity()
 * @method \App\Model\Entity\Production newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Production[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Production get($primaryKey, $options = [])
 * @method \App\Model\Entity\Production findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Production patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Production[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Production|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Production saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductionsTable extends Table
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

        $this->setTable('productions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Contracts', [
            'foreignKey' => 'production_id',
        ]);
        $this->hasMany('ProductionRecipes', [
            'foreignKey' => 'production_id',
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->integer('number_cakes')
            ->allowEmptyString('number_cakes');

        $validator
            ->scalar('observations')
            ->maxLength('observations', 800)
            ->allowEmptyString('observations');

        return $validator;
    }
}
