<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equivalences Model
 *
 * @property \App\Model\Table\EquivalenceDimensionsTable&\Cake\ORM\Association\HasMany $EquivalenceDimensions
 * @property \App\Model\Table\RawsTable&\Cake\ORM\Association\HasMany $Raws
 *
 * @method \App\Model\Entity\Equivalence newEmptyEntity()
 * @method \App\Model\Entity\Equivalence newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Equivalence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equivalence get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equivalence findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Equivalence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equivalence[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equivalence|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equivalence saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equivalence[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Equivalence[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Equivalence[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Equivalence[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EquivalencesTable extends Table
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

        $this->setTable('equivalences');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('EquivalenceDimensions', [
            'foreignKey' => 'equivalence_id',
        ]);
        $this->hasMany('Raws', [
            'foreignKey' => 'equivalence_id',
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
            ->scalar('description')
            ->maxLength('description', 150)
            ->allowEmptyString('description');

        return $validator;
    }
}
