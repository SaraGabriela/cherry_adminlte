<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductionRecipesFixture
 */
class ProductionRecipesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'production_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recipe_dimension_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'production_id' => ['type' => 'index', 'columns' => ['production_id'], 'length' => []],
            'recipe_id' => ['type' => 'index', 'columns' => ['recipe_dimension_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_production' => ['type' => 'foreign', 'columns' => ['production_id'], 'references' => ['productions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_recipes_dim' => ['type' => 'foreign', 'columns' => ['recipe_dimension_id'], 'references' => ['recipe_dimensions', 'recipe_dimensions_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
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
                'production_id' => 1,
                'recipe_dimension_id' => 1,
            ],
        ];
        parent::init();
    }
}
