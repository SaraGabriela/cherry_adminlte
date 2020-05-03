<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseProductsTable Test Case
 */
class PurchaseProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseProductsTable
     */
    protected $PurchaseProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PurchaseProducts',
        'app.Products',
        'app.Purchases',
        'app.Warehouses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PurchaseProducts') ? [] : ['className' => PurchaseProductsTable::class];
        $this->PurchaseProducts = TableRegistry::getTableLocator()->get('PurchaseProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PurchaseProducts);

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
