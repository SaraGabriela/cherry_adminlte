<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FillingProductMeasuresFixture
 */
class FillingProductMeasuresFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'filling_product_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'filling_dimension_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'unit' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_cru_re_dimen' => ['type' => 'index', 'columns' => ['filling_dimension_id'], 'length' => []],
            'id_cru_re_prod' => ['type' => 'index', 'columns' => ['filling_product_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'filling_product_measures_ibfk_1' => ['type' => 'foreign', 'columns' => ['filling_dimension_id'], 'references' => ['filling_dimensions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'filling_product_measures_ibfk_2' => ['type' => 'foreign', 'columns' => ['filling_product_id'], 'references' => ['filling_products', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'filling_product_id' => 1,
                'filling_dimension_id' => 1,
                'quantity' => 1.5,
                'unit' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
