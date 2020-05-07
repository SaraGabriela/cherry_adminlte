<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionsTable Test Case
 */
class ProductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionsTable
     */
    protected $Productions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Productions',
        'app.Contracts',
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
        $config = TableRegistry::getTableLocator()->exists('Productions') ? [] : ['className' => ProductionsTable::class];
        $this->Productions = TableRegistry::getTableLocator()->get('Productions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productions);

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
