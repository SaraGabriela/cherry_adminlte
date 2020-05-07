<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreviousPreparationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreviousPreparationsTable Test Case
 */
class PreviousPreparationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PreviousPreparationsTable
     */
    protected $PreviousPreparations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PreviousPreparations',
        'app.PreparationProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PreviousPreparations') ? [] : ['className' => PreviousPreparationsTable::class];
        $this->PreviousPreparations = TableRegistry::getTableLocator()->get('PreviousPreparations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PreviousPreparations);

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
