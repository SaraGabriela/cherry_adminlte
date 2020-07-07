<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransferWarehouseProductsFixture
 */
class TransferWarehouseProductsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'warehouse_product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'transfer_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unit' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'warehouse_product_id' => ['type' => 'index', 'columns' => ['warehouse_product_id'], 'length' => []],
            'transfer_id' => ['type' => 'index', 'columns' => ['transfer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'transfer_warehouse_products_ibfk_1' => ['type' => 'foreign', 'columns' => ['transfer_id'], 'references' => ['transfers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'transfer_warehouse_products_ibfk_2' => ['type' => 'foreign', 'columns' => ['warehouse_product_id'], 'references' => ['warehouse_products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'warehouse_product_id' => 1,
                'transfer_id' => 1,
                'quantity' => 1,
                'unit' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
