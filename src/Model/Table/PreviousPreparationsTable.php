<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PreviousPreparations Model
 *
 * @property \App\Model\Table\PreparationProductsTable&\Cake\ORM\Association\HasMany $PreparationProducts
 *
 * @method \App\Model\Entity\PreviousPreparation newEmptyEntity()
 * @method \App\Model\Entity\PreviousPreparation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PreviousPreparation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PreviousPreparation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PreviousPreparation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PreviousPreparation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PreviousPreparation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PreviousPreparation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PreviousPreparation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PreviousPreparation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreviousPreparation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreviousPreparation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PreviousPreparation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PreviousPreparationsTable extends Table
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

        $this->setTable('previous_preparations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('PreparationProducts', [
            'foreignKey' => 'previous_preparation_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 150)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->decimal('quantity_produced')
            ->requirePresence('quantity_produced', 'create')
            ->notEmptyString('quantity_produced');

        return $validator;
    }
}
