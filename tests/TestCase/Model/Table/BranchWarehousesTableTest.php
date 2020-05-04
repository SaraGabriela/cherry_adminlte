<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchWarehousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchWarehousesTable Test Case
 */
class BranchWarehousesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchWarehousesTable
     */
    protected $BranchWarehouses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BranchWarehouses',
        'app.Warehouses',
        'app.Branches',
        'app.WarehouseProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BranchWarehouses') ? [] : ['className' => BranchWarehousesTable::class];
        $this->BranchWarehouses = TableRegistry::getTableLocator()->get('BranchWarehouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BranchWarehouses);

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
