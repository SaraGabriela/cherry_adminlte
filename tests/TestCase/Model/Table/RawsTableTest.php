<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RawsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RawsTable Test Case
 */
class RawsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RawsTable
     */
    protected $Raws;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Raws',
        'app.Equivalences',
        'app.RawProducts',
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
        $config = TableRegistry::getTableLocator()->exists('Raws') ? [] : ['className' => RawsTable::class];
        $this->Raws = TableRegistry::getTableLocator()->get('Raws', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Raws);

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
