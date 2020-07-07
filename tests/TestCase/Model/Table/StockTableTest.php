<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockTable Test Case
 */
class StockTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StockTable
     */
    protected $Stock;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Stock',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Stock') ? [] : ['className' => StockTable::class];
        $this->Stock = TableRegistry::getTableLocator()->get('Stock', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Stock);

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
