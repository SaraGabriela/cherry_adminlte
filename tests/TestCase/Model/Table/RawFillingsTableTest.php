<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RawFillingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RawFillingsTable Test Case
 */
class RawFillingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RawFillingsTable
     */
    protected $RawFillings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RawFillings',
        'app.FillingDimensions',
        'app.FillingProducts',
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
        $config = TableRegistry::getTableLocator()->exists('RawFillings') ? [] : ['className' => RawFillingsTable::class];
        $this->RawFillings = TableRegistry::getTableLocator()->get('RawFillings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RawFillings);

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
