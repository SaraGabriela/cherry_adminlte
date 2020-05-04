<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dimensions Model
 *
 * @property \App\Model\Table\DecorationDimensionsTable&\Cake\ORM\Association\HasMany $DecorationDimensions
 * @property \App\Model\Table\EquivalenceDimensionsTable&\Cake\ORM\Association\HasMany $EquivalenceDimensions
 * @property \App\Model\Table\FillingDimensionsTable&\Cake\ORM\Association\HasMany $FillingDimensions
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\HasMany $Recipes
 *
 * @method \App\Model\Entity\Dimension newEmptyEntity()
 * @method \App\Model\Entity\Dimension newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Dimension[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dimension get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dimension findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Dimension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dimension[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dimension|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dimension saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dimension[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dimension[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dimension[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Dimension[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DimensionsTable extends Table
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

        $this->setTable('dimensions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DecorationDimensions', [
            'foreignKey' => 'dimension_id',
        ]);
        $this->hasMany('EquivalenceDimensions', [
            'foreignKey' => 'dimension_id',
        ]);
        $this->hasMany('FillingDimensions', [
            'foreignKey' => 'dimension_id',
        ]);
        $this->hasMany('Recipes', [
            'foreignKey' => 'dimension_id',
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
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
