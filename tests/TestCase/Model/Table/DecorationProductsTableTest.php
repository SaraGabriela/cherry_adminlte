<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecorationProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecorationProductsTable Test Case
 */
class DecorationProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DecorationProductsTable
     */
    protected $DecorationProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DecorationProducts',
        'app.Decorations',
        'app.Products',
        'app.DecorationProductMeasures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DecorationProducts') ? [] : ['className' => DecorationProductsTable::class];
        $this->DecorationProducts = TableRegistry::getTableLocator()->get('DecorationProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DecorationProducts);

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
