<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecorationProductMeasuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecorationProductMeasuresTable Test Case
 */
class DecorationProductMeasuresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DecorationProductMeasuresTable
     */
    protected $DecorationProductMeasures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DecorationProductMeasures',
        'app.DecorationDimensions',
        'app.DecorationProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DecorationProductMeasures') ? [] : ['className' => DecorationProductMeasuresTable::class];
        $this->DecorationProductMeasures = TableRegistry::getTableLocator()->get('DecorationProductMeasures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DecorationProductMeasures);

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
