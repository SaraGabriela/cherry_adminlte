<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EquivalenceDimensionsFixture
 */
class EquivalenceDimensionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'equivalence_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dimension_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity_recipes' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'id_dimensiones' => ['type' => 'index', 'columns' => ['dimension_id'], 'length' => []],
            'id_equivalencias' => ['type' => 'index', 'columns' => ['equivalence_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'equivalence_dimensions_ibfk_1' => ['type' => 'foreign', 'columns' => ['dimension_id'], 'references' => ['dimensions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'equivalence_dimensions_ibfk_2' => ['type' => 'foreign', 'columns' => ['equivalence_id'], 'references' => ['equivalences', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
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
                'equivalence_id' => 1,
                'dimension_id' => 1,
                'quantity_recipes' => 1.5,
            ],
        ];
        parent::init();
    }
}
