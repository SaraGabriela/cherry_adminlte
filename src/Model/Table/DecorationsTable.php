<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Decorations Model
 *
 * @property \App\Model\Table\DecorationDimensionsTable&\Cake\ORM\Association\HasMany $DecorationDimensions
 * @property \App\Model\Table\DecorationProductsTable&\Cake\ORM\Association\HasMany $DecorationProducts
 * @property \App\Model\Table\RecipesTable&\Cake\ORM\Association\HasMany $Recipes
 *
 * @method \App\Model\Entity\Decoration newEmptyEntity()
 * @method \App\Model\Entity\Decoration newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Decoration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Decoration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Decoration findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Decoration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Decoration[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Decoration|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Decoration saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DecorationsTable extends Table
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

        $this->setTable('decorations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DecorationDimensions', [
            'foreignKey' => 'decoration_id',
        ]);
        $this->hasMany('DecorationProducts', [
            'foreignKey' => 'decoration_id',
        ]);
        $this->hasMany('Recipes', [
            'foreignKey' => 'decoration_id',
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

        $validator
            ->scalar('code')
            ->maxLength('code', 50)
            ->allowEmptyString('code');

        return $validator;
    }
}
