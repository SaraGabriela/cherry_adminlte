<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FillingDimensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FillingDimensionsTable Test Case
 */
class FillingDimensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FillingDimensionsTable
     */
    protected $FillingDimensions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FillingDimensions',
        'app.RawFillings',
        'app.Dimensions',
        'app.FillingProductMeasures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FillingDimensions') ? [] : ['className' => FillingDimensionsTable::class];
        $this->FillingDimensions = TableRegistry::getTableLocator()->get('FillingDimensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FillingDimensions);

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
