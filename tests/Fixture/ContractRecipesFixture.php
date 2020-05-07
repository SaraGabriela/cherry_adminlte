<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContractRecipesFixture
 */
class ContractRecipesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'contract_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recipe_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'contract_id' => ['type' => 'index', 'columns' => ['contract_id'], 'length' => []],
            'recipe_id' => ['type' => 'index', 'columns' => ['recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'contract_recipes_ibfk_1' => ['type' => 'foreign', 'columns' => ['contract_id'], 'references' => ['contracts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'contract_recipes_ibfk_2' => ['type' => 'foreign', 'columns' => ['recipe_id'], 'references' => ['recipes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'contract_id' => 1,
                'recipe_id' => 1,
            ],
        ];
        parent::init();
    }
}
