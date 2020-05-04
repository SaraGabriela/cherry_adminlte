<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DecorationProducts Model
 *
 * @property \App\Model\Table\DecorationsTable&\Cake\ORM\Association\BelongsTo $Decorations
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\DecorationProductMeasuresTable&\Cake\ORM\Association\HasMany $DecorationProductMeasures
 *
 * @method \App\Model\Entity\DecorationProduct newEmptyEntity()
 * @method \App\Model\Entity\DecorationProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\DecorationProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DecorationProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DecorationProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DecorationProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DecorationProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DecorationProductsTable extends Table
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

        $this->setTable('decoration_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Decorations', [
            'foreignKey' => 'decoration_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DecorationProductMeasures', [
            'foreignKey' => 'decoration_product_id',
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
        $rules->add($rules->existsIn(['decoration_id'], 'Decorations'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
