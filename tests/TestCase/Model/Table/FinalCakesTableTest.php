<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FinalCakesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FinalCakesTable Test Case
 */
class FinalCakesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FinalCakesTable
     */
    protected $FinalCakes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FinalCakes',
        'app.Cakes',
        'app.ProductionRecipes',
        'app.TransferFinalCake',
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
        $config = TableRegistry::getTableLocator()->exists('FinalCakes') ? [] : ['className' => FinalCakesTable::class];
        $this->FinalCakes = TableRegistry::getTableLocator()->get('FinalCakes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FinalCakes);

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
