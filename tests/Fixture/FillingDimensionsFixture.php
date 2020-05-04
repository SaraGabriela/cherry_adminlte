<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FillingDimensionsFixture
 */
class FillingDimensionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'raw_filling_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dimension_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_crudo_relleno' => ['type' => 'index', 'columns' => ['raw_filling_id'], 'length' => []],
            'id_dimensiones' => ['type' => 'index', 'columns' => ['dimension_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'filling_dimensions_ibfk_1' => ['type' => 'foreign', 'columns' => ['raw_filling_id'], 'references' => ['raw_fillings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'filling_dimensions_ibfk_2' => ['type' => 'foreign', 'columns' => ['dimension_id'], 'references' => ['dimensions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'raw_filling_id' => 1,
                'dimension_id' => 1,
            ],
        ];
        parent::init();
    }
}
