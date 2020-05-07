<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractsTable Test Case
 */
class ContractsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractsTable
     */
    protected $Contracts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Contracts',
        'app.Clients',
        'app.Productions',
        'app.Alliances',
        'app.ContractRecipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Contracts') ? [] : ['className' => ContractsTable::class];
        $this->Contracts = TableRegistry::getTableLocator()->get('Contracts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Contracts);

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
