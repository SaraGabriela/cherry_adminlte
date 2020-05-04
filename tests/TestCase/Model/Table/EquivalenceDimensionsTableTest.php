<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquivalenceDimensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquivalenceDimensionsTable Test Case
 */
class EquivalenceDimensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EquivalenceDimensionsTable
     */
    protected $EquivalenceDimensions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EquivalenceDimensions',
        'app.Equivalences',
        'app.Dimensions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EquivalenceDimensions') ? [] : ['className' => EquivalenceDimensionsTable::class];
        $this->EquivalenceDimensions = TableRegistry::getTableLocator()->get('EquivalenceDimensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EquivalenceDimensions);

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
