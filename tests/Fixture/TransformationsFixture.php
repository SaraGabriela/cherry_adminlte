<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransformationsFixture
 */
class TransformationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'final_cake_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prodrecipe_detail_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recipe' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'detail' => ['type' => 'string', 'length' => 600, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'phase' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'final_cake_id' => ['type' => 'index', 'columns' => ['final_cake_id'], 'length' => []],
            'prodrecipe_detail_id' => ['type' => 'index', 'columns' => ['prodrecipe_detail_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'transformations_ibfk_1' => ['type' => 'foreign', 'columns' => ['final_cake_id'], 'references' => ['recipe_dimensions', 'recipe_dimensions_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'transformations_ibfk_2' => ['type' => 'foreign', 'columns' => ['prodrecipe_detail_id'], 'references' => ['prodrecipe_details', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'final_cake_id' => 1,
                'prodrecipe_detail_id' => 1,
                'recipe' => 1,
                'date' => '2020-06-14',
                'detail' => 'Lorem ipsum dolor sit amet',
                'phase' => 1,
            ],
        ];
        parent::init();
    }
}
