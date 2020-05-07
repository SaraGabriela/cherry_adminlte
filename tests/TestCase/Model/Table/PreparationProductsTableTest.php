<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreparationProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreparationProductsTable Test Case
 */
class PreparationProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PreparationProductsTable
     */
    protected $PreparationProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PreparationProducts',
        'app.PreviousPreparations',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PreparationProducts') ? [] : ['className' => PreparationProductsTable::class];
        $this->PreparationProducts = TableRegistry::getTableLocator()->get('PreparationProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PreparationProducts);

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
