<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferProductionRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferProductionRecipesTable Test Case
 */
class TransferProductionRecipesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferProductionRecipesTable
     */
    protected $TransferProductionRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TransferProductionRecipes',
        'app.Transfers',
        'app.ProdrecipeDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TransferProductionRecipes') ? [] : ['className' => TransferProductionRecipesTable::class];
        $this->TransferProductionRecipes = TableRegistry::getTableLocator()->get('TransferProductionRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TransferProductionRecipes);

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
