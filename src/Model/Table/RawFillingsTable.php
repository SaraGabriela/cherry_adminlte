<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RawFillings Model
 *
 * @property \App\Model\Table\FillingDimensionsTable&\Cake\ORM\Association\HasMany $FillingDimensions
 * @property \App\Model\Table\FillingProductsTable&\Cake\ORM\Association\HasMany $FillingProducts
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\HasMany $Recipes
 *
 * @method \App\Model\Entity\RawFilling newEmptyEntity()
 * @method \App\Model\Entity\RawFilling newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RawFilling[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RawFilling get($primaryKey, $options = [])
 * @method \App\Model\Entity\RawFilling findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RawFilling patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RawFilling[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RawFilling|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawFilling saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawFilling[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawFilling[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawFilling[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawFilling[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RawFillingsTable extends Table
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

        $this->setTable('raw_fillings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FillingDimensions', [
            'foreignKey' => 'raw_filling_id',
        ]);
        $this->hasMany('FillingProducts', [
            'foreignKey' => 'raw_filling_id',
        ]);
        $this->hasMany('Recipes', [
            'foreignKey' => 'raw_filling_id',
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
            ->integer('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        return $validator;
    }
}
