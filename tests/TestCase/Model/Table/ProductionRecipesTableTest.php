<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionRecipesTable Test Case
 */
class ProductionRecipesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionRecipesTable
     */
    protected $ProductionRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductionRecipes',
        'app.Productions',
        'app.Recipes',
        'app.FinalCakes',
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
        $config = TableRegistry::getTableLocator()->exists('ProductionRecipes') ? [] : ['className' => ProductionRecipesTable::class];
        $this->ProductionRecipes = TableRegistry::getTableLocator()->get('ProductionRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductionRecipes);

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
