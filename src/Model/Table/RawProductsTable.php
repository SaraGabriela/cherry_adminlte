<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RawProducts Model
 *
 * @property \App\Model\Table\RawsTable&\Cake\ORM\Association\BelongsTo $Raws
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\RecipeProductMeasuresTable&\Cake\ORM\Association\HasMany $RecipeProductMeasures
 *
 * @method \App\Model\Entity\RawProduct newEmptyEntity()
 * @method \App\Model\Entity\RawProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RawProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RawProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\RawProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RawProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RawProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RawProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RawProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RawProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RawProductsTable extends Table
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

        $this->setTable('raw_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('RecipeProductMeasures', [
            'foreignKey' => 'raw_product_id',
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
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
