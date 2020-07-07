<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferFinalCakeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferFinalCakeTable Test Case
 */
class TransferFinalCakeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferFinalCakeTable
     */
    protected $TransferFinalCake;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TransferFinalCake',
        'app.Transfers',
        'app.FinalCakes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TransferFinalCake') ? [] : ['className' => TransferFinalCakeTable::class];
        $this->TransferFinalCake = TableRegistry::getTableLocator()->get('TransferFinalCake', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TransferFinalCake);

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
