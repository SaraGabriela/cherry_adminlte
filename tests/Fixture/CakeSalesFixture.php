<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CakeSalesFixture
 */
class CakeSalesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cake_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'alliance_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'sale_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'sale_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'alliance_id' => ['type' => 'index', 'columns' => ['alliance_id'], 'length' => []],
            'cake_id' => ['type' => 'index', 'columns' => ['cake_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cake_sales_ibfk_1' => ['type' => 'foreign', 'columns' => ['alliance_id'], 'references' => ['alliances', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'cake_sales_ibfk_2' => ['type' => 'foreign', 'columns' => ['cake_id'], 'references' => ['cakes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'cake_id' => 1,
                'alliance_id' => 1,
                'branch' => 'Lorem ipsum dolor sit amet',
                'sale_date' => '2020-05-06',
                'sale_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
