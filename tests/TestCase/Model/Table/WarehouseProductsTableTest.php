<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WarehouseProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WarehouseProductsTable Test Case
 */
class WarehouseProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WarehouseProductsTable
     */
    protected $WarehouseProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.WarehouseProducts',
        'app.BranchWarehouses',
        'app.Products',
        'app.TransferWarehouseProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WarehouseProducts') ? [] : ['className' => WarehouseProductsTable::class];
        $this->WarehouseProducts = TableRegistry::getTableLocator()->get('WarehouseProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->WarehouseProducts);

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
