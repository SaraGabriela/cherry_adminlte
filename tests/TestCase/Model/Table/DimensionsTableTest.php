<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DimensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DimensionsTable Test Case
 */
class DimensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DimensionsTable
     */
    protected $Dimensions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dimensions',
        'app.DecorationDimensions',
        'app.EquivalenceDimensions',
        'app.FillingDimensions',
        'app.RecipeDimensions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dimensions') ? [] : ['className' => DimensionsTable::class];
        $this->Dimensions = TableRegistry::getTableLocator()->get('Dimensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dimensions);

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
