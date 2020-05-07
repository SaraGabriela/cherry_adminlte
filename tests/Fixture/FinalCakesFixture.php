<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FinalCakesFixture
 */
class FinalCakesFixture extends TestFixture
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
        'production_recipe_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'arrival_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'cake_id' => ['type' => 'index', 'columns' => ['cake_id'], 'length' => []],
            'production_recipe_id' => ['type' => 'index', 'columns' => ['production_recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'final_cakes_ibfk_1' => ['type' => 'foreign', 'columns' => ['cake_id'], 'references' => ['cakes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'final_cakes_ibfk_2' => ['type' => 'foreign', 'columns' => ['production_recipe_id'], 'references' => ['production_recipes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'production_recipe_id' => 1,
                'price' => 1.5,
                'arrival_date' => '2020-05-06',
            ],
        ];
        parent::init();
    }
}
