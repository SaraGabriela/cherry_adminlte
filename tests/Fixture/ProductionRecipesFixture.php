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
        'recipe_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'observations' => ['type' => 'string', 'length' => 650, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'production_id' => ['type' => 'index', 'columns' => ['production_id'], 'length' => []],
            'recipe_id' => ['type' => 'index', 'columns' => ['recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'production_recipes_ibfk_1' => ['type' => 'foreign', 'columns' => ['production_id'], 'references' => ['productions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'production_recipes_ibfk_2' => ['type' => 'foreign', 'columns' => ['recipe_id'], 'references' => ['recipes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'recipe_id' => 1,
                'observations' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
