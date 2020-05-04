<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Raws Model
 *
 * @property \App\Model\Table\EquivalencesTable&\Cake\ORM\Association\BelongsTo $Equivalences
 * @property \App\Model\Table\RawProductsTable&\Cake\ORM\Association\HasMany $RawProducts
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\HasMany $Recipes
 *
 * @method \App\Model\Entity\Raw newEmptyEntity()
 * @method \App\Model\Entity\Raw newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Raw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Raw get($primaryKey, $options = [])
 * @method \App\Model\Entity\Raw findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Raw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Raw[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Raw|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Raw saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Raw[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Raw[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Raw[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Raw[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RawsTable extends Table
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

        $this->setTable('raws');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Equivalences', [
            'foreignKey' => 'equivalence_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('RawProducts', [
            'foreignKey' => 'raw_id',
        ]);
        $this->hasMany('Recipes', [
            'foreignKey' => 'raw_id',
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
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 250)
            ->allowEmptyString('code');

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
        $rules->add($rules->existsIn(['equivalence_id'], 'Equivalences'));

        return $rules;
    }
}
