<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FillingProducts Model
 *
 * @property \App\Model\Table\RawFillingsTable&\Cake\ORM\Association\BelongsTo $RawFillings
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\FillingProductMeasuresTable&\Cake\ORM\Association\HasMany $FillingProductMeasures
 *
 * @method \App\Model\Entity\FillingProduct newEmptyEntity()
 * @method \App\Model\Entity\FillingProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FillingProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FillingProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\FillingProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FillingProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FillingProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FillingProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FillingProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FillingProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FillingProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FillingProductsTable extends Table
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

        $this->setTable('filling_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('RawFillings', [
            'foreignKey' => 'raw_filling_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FillingProductMeasures', [
            'foreignKey' => 'filling_product_id',
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
        $rules->add($rules->existsIn(['raw_filling_id'], 'RawFillings'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
