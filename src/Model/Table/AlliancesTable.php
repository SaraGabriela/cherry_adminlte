<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alliances Model
 *
 * @property \App\Model\Table\CakeSalesTable&\Cake\ORM\Association\HasMany $CakeSales
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\Alliance newEmptyEntity()
 * @method \App\Model\Entity\Alliance newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Alliance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alliance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alliance findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Alliance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alliance[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alliance|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alliance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alliance[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alliance[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alliance[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alliance[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AlliancesTable extends Table
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

        $this->setTable('alliances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('CakeSales', [
            'foreignKey' => 'alliance_id',
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'alliance_id',
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
            ->scalar('client')
            ->maxLength('client', 250)
            ->requirePresence('client', 'create')
            ->notEmptyString('client');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->decimal('ticket_value')
            ->requirePresence('ticket_value', 'create')
            ->notEmptyString('ticket_value');

        $validator
            ->integer('ticket_quantity')
            ->requirePresence('ticket_quantity', 'create')
            ->notEmptyString('ticket_quantity');

        return $validator;
    }
}
