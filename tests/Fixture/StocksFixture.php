<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StocksFixture
 */
class StocksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'stock_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'recipe_dimensions_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_asda' => ['type' => 'index', 'columns' => ['branch_id'], 'length' => []],
            'fk_asdda' => ['type' => 'index', 'columns' => ['recipe_dimensions_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['stock_id'], 'length' => []],
            'fk_asda' => ['type' => 'foreign', 'columns' => ['branch_id'], 'references' => ['branches', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_asdda' => ['type' => 'foreign', 'columns' => ['recipe_dimensions_id'], 'references' => ['recipe_dimensions', 'recipe_dimensions_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'stock_id' => 1,
                'recipe_dimensions_id' => 1,
                'branch_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
