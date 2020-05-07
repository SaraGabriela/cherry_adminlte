<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractRecipesTable Test Case
 */
class ContractRecipesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractRecipesTable
     */
    protected $ContractRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ContractRecipes',
        'app.Contracts',
        'app.Recipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContractRecipes') ? [] : ['className' => ContractRecipesTable::class];
        $this->ContractRecipes = TableRegistry::getTableLocator()->get('ContractRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ContractRecipes);

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
