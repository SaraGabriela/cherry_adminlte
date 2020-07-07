<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlliancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlliancesTable Test Case
 */
class AlliancesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlliancesTable
     */
    protected $Alliances;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Alliances',
        'app.Contracts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Alliances') ? [] : ['className' => AlliancesTable::class];
        $this->Alliances = TableRegistry::getTableLocator()->get('Alliances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Alliances);

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
