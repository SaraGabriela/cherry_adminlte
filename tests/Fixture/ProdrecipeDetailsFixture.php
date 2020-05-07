<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdrecipeDetailsFixture
 */
class ProdrecipeDetailsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'production_recipe_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch_warehouse_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cake_phase' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'current_ubication' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'special_order' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'priority' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'observations' => ['type' => 'string', 'length' => 600, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'date_phase_change' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'branch_warehouse_id' => ['type' => 'index', 'columns' => ['branch_warehouse_id'], 'length' => []],
            'production_recipe_id' => ['type' => 'index', 'columns' => ['production_recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'prodrecipe_details_ibfk_1' => ['type' => 'foreign', 'columns' => ['branch_warehouse_id'], 'references' => ['branch_warehouses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prodrecipe_details_ibfk_2' => ['type' => 'foreign', 'columns' => ['production_recipe_id'], 'references' => ['production_recipes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'production_recipe_id' => 1,
                'branch_warehouse_id' => 1,
                'cake_phase' => 1,
                'current_ubication' => 'Lorem ipsum dolor sit amet',
                'special_order' => 1,
                'priority' => 1,
                'branch' => 'Lorem ipsum dolor sit amet',
                'observations' => 'Lorem ipsum dolor sit amet',
                'date_phase_change' => '2020-05-06',
            ],
        ];
        parent::init();
    }
}
