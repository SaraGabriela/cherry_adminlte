<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RawRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RawRecipesTable Test Case
 */
class RawRecipesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RawRecipesTable
     */
    protected $RawRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RawRecipes',
        'app.RecipeProductMeasures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RawRecipes') ? [] : ['className' => RawRecipesTable::class];
        $this->RawRecipes = TableRegistry::getTableLocator()->get('RawRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RawRecipes);

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
}
