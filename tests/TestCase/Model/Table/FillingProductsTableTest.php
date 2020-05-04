<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FillingProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FillingProductsTable Test Case
 */
class FillingProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FillingProductsTable
     */
    protected $FillingProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FillingProducts',
        'app.RawFillings',
        'app.Products',
        'app.FillingProductMeasures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FillingProducts') ? [] : ['className' => FillingProductsTable::class];
        $this->FillingProducts = TableRegistry::getTableLocator()->get('FillingProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FillingProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
