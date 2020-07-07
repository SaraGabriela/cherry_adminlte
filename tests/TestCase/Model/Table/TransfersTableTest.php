<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransfersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransfersTable Test Case
 */
class TransfersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransfersTable
     */
    protected $Transfers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Transfers',
        'app.BranchWarehouses',
        'app.TransferFinalCake',
        'app.TransferProductionRecipes',
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
        $config = TableRegistry::getTableLocator()->exists('Transfers') ? [] : ['className' => TransfersTable::class];
        $this->Transfers = TableRegistry::getTableLocator()->get('Transfers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Transfers);

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
