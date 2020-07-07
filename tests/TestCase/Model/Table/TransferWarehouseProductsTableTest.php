<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferWarehouseProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferWarehouseProductsTable Test Case
 */
class TransferWarehouseProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferWarehouseProductsTable
     */
    protected $TransferWarehouseProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TransferWarehouseProducts',
        'app.WarehouseProducts',
        'app.Transfers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TransferWarehouseProducts') ? [] : ['className' => TransferWarehouseProductsTable::class];
        $this->TransferWarehouseProducts = TableRegistry::getTableLocator()->get('TransferWarehouseProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TransferWarehouseProducts);

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
