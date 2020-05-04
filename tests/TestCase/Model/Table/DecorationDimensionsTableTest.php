<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecorationDimensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecorationDimensionsTable Test Case
 */
class DecorationDimensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DecorationDimensionsTable
     */
    protected $DecorationDimensions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DecorationDimensions',
        'app.Decorations',
        'app.Dimensions',
        'app.DecorationProductMeasures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DecorationDimensions') ? [] : ['className' => DecorationDimensionsTable::class];
        $this->DecorationDimensions = TableRegistry::getTableLocator()->get('DecorationDimensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DecorationDimensions);

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
