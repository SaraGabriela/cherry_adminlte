<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CakeSales Model
 *
 * @property \App\Model\Table\CakesTable&\Cake\ORM\Association\BelongsTo $Cakes
 * @property \App\Model\Table\AlliancesTable&\Cake\ORM\Association\BelongsTo $Alliances
 *
 * @method \App\Model\Entity\CakeSale newEmptyEntity()
 * @method \App\Model\Entity\CakeSale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CakeSale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CakeSale get($primaryKey, $options = [])
 * @method \App\Model\Entity\CakeSale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CakeSale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CakeSale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CakeSale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CakeSale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CakeSale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CakeSale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CakeSale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CakeSale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CakeSalesTable extends Table
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

        $this->setTable('cake_sales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cakes', [
            'foreignKey' => 'cake_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Alliances', [
            'foreignKey' => 'alliance_id',
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
            ->scalar('branch')
            ->maxLength('branch', 250)
            ->requirePresence('branch', 'create')
            ->notEmptyString('branch');

        $validator
            ->date('sale_date')
            ->requirePresence('sale_date', 'create')
            ->notEmptyDate('sale_date');

        $validator
            ->decimal('sale_price')
            ->requirePresence('sale_price', 'create')
            ->notEmptyString('sale_price');

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
        $rules->add($rules->existsIn(['alliance_id'], 'Alliances'));

        return $rules;
    }
}
