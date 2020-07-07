<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cakes Model
 *
 * @property \App\Model\Table\FinalCakesTable&\Cake\ORM\Association\HasMany $FinalCakes
 *
 * @method \App\Model\Entity\Cake newEmptyEntity()
 * @method \App\Model\Entity\Cake newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cake[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cake get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cake findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cake patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cake[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cake|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cake saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cake[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cake[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cake[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cake[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CakesTable extends Table
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

        $this->setTable('cakes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FinalCakes', [
            'foreignKey' => 'cake_id',
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
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->allowEmptyString('code');

        return $validator;
    }
}
