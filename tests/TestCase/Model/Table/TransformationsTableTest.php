<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransformationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransformationsTable Test Case
 */
class TransformationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransformationsTable
     */
    protected $Transformations;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Transformations',
        'app.FinalCakes',
        'app.ProdrecipeDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Transformations') ? [] : ['className' => TransformationsTable::class];
        $this->Transformations = TableRegistry::getTableLocator()->get('Transformations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Transformations);

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
