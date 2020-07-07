<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoreFixture
 */
class StoreFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'store';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sale_type' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'alliance_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'alliance_id' => ['type' => 'index', 'columns' => ['alliance_id'], 'length' => []],
            'branch_id' => ['type' => 'index', 'columns' => ['branch_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_alliance' => ['type' => 'foreign', 'columns' => ['alliance_id'], 'references' => ['alliances', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_branch' => ['type' => 'foreign', 'columns' => ['branch_id'], 'references' => ['branches', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'sale_type' => 'Lorem ipsum dolor sit amet',
                'alliance_id' => 1,
                'branch_id' => 1,
            ],
        ];
        parent::init();
    }
}
