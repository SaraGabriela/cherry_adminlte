<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CakesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CakesTable Test Case
 */
class CakesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CakesTable
     */
    protected $Cakes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Cakes',
        'app.CakeSales',
        'app.FinalCakes',
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
        $config = TableRegistry::getTableLocator()->exists('Cakes') ? [] : ['className' => CakesTable::class];
        $this->Cakes = TableRegistry::getTableLocator()->get('Cakes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Cakes);

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
