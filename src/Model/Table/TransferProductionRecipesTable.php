<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransferProductionRecipes Model
 *
 * @property \App\Model\Table\TransfersTable&\Cake\ORM\Association\BelongsTo $Transfers
 * @property \App\Model\Table\ProdrecipeDetailsTable&\Cake\ORM\Association\BelongsTo $ProdrecipeDetails
 *
 * @method \App\Model\Entity\TransferProductionRecipe newEmptyEntity()
 * @method \App\Model\Entity\TransferProductionRecipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TransferProductionRecipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TransferProductionRecipesTable extends Table
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

        $this->setTable('transfer_production_recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Transfers', [
            'foreignKey' => 'transfer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProdrecipeDetails', [
            'foreignKey' => 'prodrecipe_details_id',
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
        $rules->add($rules->existsIn(['transfer_id'], 'Transfers'));
        $rules->add($rules->existsIn(['prodrecipe_details_id'], 'ProdrecipeDetails'));

        return $rules;
    }
}
