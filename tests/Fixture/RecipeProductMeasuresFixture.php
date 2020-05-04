<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipeProductMeasuresFixture
 */
class RecipeProductMeasuresFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'raw_product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'raw_recipe_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'unit' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_crudo_producto' => ['type' => 'index', 'columns' => ['raw_product_id'], 'length' => []],
            'id_crudo_receta' => ['type' => 'index', 'columns' => ['raw_recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'recipe_product_measures_ibfk_1' => ['type' => 'foreign', 'columns' => ['raw_product_id'], 'references' => ['raw_products', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'recipe_product_measures_ibfk_2' => ['type' => 'foreign', 'columns' => ['raw_recipe_id'], 'references' => ['raw_recipes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'raw_product_id' => 1,
                'raw_recipe_id' => 1,
                'quantity' => 1.5,
                'unit' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
