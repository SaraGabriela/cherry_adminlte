<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransferFinalCakeFixture
 */
class TransferFinalCakeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'transfer_final_cake';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'transfer_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'final_cake_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'transfer_id' => ['type' => 'index', 'columns' => ['transfer_id'], 'length' => []],
            'final_cake_id' => ['type' => 'index', 'columns' => ['final_cake_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'transfer_final_cake_ibfk_1' => ['type' => 'foreign', 'columns' => ['transfer_id'], 'references' => ['transfers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'transfer_final_cake_ibfk_2' => ['type' => 'foreign', 'columns' => ['final_cake_id'], 'references' => ['final_cakes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'transfer_id' => 1,
                'final_cake_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
