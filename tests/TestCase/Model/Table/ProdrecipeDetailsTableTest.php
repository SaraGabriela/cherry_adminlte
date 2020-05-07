<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdrecipeDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdrecipeDetailsTable Test Case
 */
class ProdrecipeDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdrecipeDetailsTable
     */
    protected $ProdrecipeDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProdrecipeDetails',
        'app.ProductionRecipes',
        'app.BranchWarehouses',
        'app.Transformations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProdrecipeDetails') ? [] : ['className' => ProdrecipeDetailsTable::class];
        $this->ProdrecipeDetails = TableRegistry::getTableLocator()->get('ProdrecipeDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProdrecipeDetails);

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
