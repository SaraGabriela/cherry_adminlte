<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransfersFixture
 */
class TransfersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'date' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'manager' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'branch_warehouse_origin_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch_warehouse_destiny_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'branch_warehouse_origin_id' => ['type' => 'index', 'columns' => ['branch_warehouse_origin_id'], 'length' => []],
            'branch_warehouse_destiny_id' => ['type' => 'index', 'columns' => ['branch_warehouse_destiny_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'transfers_ibfk_1' => ['type' => 'foreign', 'columns' => ['branch_warehouse_origin_id'], 'references' => ['branch_warehouses', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'transfers_ibfk_2' => ['type' => 'foreign', 'columns' => ['branch_warehouse_destiny_id'], 'references' => ['branch_warehouses', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'date' => '2020-06-14 22:34:14',
                'manager' => 'Lorem ipsum dolor sit amet',
                'branch_warehouse_origin_id' => 1,
                'branch_warehouse_destiny_id' => 1,
            ],
        ];
        parent::init();
    }
}
