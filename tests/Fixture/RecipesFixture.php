<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecipesFixture
 */
class RecipesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'raw_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'raw_filling_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'decoration_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cooking_time' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'observations' => ['type' => 'string', 'length' => 450, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'comercial_name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'photo' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_crudo' => ['type' => 'index', 'columns' => ['raw_id'], 'length' => []],
            'id_cru_relleno' => ['type' => 'index', 'columns' => ['raw_filling_id'], 'length' => []],
            'decoration_id' => ['type' => 'index', 'columns' => ['decoration_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'recipes_ibfk_2' => ['type' => 'foreign', 'columns' => ['raw_id'], 'references' => ['raws', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'recipes_ibfk_3' => ['type' => 'foreign', 'columns' => ['raw_filling_id'], 'references' => ['raw_fillings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'recipes_ibfk_4' => ['type' => 'foreign', 'columns' => ['decoration_id'], 'references' => ['decorations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'raw_id' => 1,
                'raw_filling_id' => 1,
                'decoration_id' => 1,
                'cooking_time' => 'Lorem ipsum dolor sit amet',
                'observations' => 'Lorem ipsum dolor sit amet',
                'comercial_name' => 'Lorem ipsum dolor sit amet',
                'photo' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
