<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DecorationDimensionsFixture
 */
class DecorationDimensionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'decoration_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dimension_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'decoration_id' => ['type' => 'index', 'columns' => ['decoration_id'], 'length' => []],
            'dimension_id' => ['type' => 'index', 'columns' => ['dimension_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'decoration_dimensions_ibfk_1' => ['type' => 'foreign', 'columns' => ['decoration_id'], 'references' => ['decorations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'decoration_dimensions_ibfk_2' => ['type' => 'foreign', 'columns' => ['dimension_id'], 'references' => ['dimensions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'decoration_id' => 1,
                'dimension_id' => 1,
            ],
        ];
        parent::init();
    }
}
