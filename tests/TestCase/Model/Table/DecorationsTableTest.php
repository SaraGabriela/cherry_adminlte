<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecorationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecorationsTable Test Case
 */
class DecorationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DecorationsTable
     */
    protected $Decorations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Decorations',
        'app.DecorationDimensions',
        'app.DecorationProducts',
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
        $config = TableRegistry::getTableLocator()->exists('Decorations') ? [] : ['className' => DecorationsTable::class];
        $this->Decorations = TableRegistry::getTableLocator()->get('Decorations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Decorations);

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
