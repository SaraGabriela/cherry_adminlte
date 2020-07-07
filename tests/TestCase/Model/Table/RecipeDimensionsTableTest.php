<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipeDimensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipeDimensionsTable Test Case
 */
class RecipeDimensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipeDimensionsTable
     */
    protected $RecipeDimensions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RecipeDimensions',
        'app.Dimensions',
        'app.Recipes',
        'app.ProductionRecipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RecipeDimensions') ? [] : ['className' => RecipeDimensionsTable::class];
        $this->RecipeDimensions = TableRegistry::getTableLocator()->get('RecipeDimensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RecipeDimensions);

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
