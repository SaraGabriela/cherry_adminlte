<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquivalencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquivalencesTable Test Case
 */
class EquivalencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EquivalencesTable
     */
    protected $Equivalences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Equivalences',
        'app.EquivalenceDimensions',
        'app.Raws',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Equivalences') ? [] : ['className' => EquivalencesTable::class];
        $this->Equivalences = TableRegistry::getTableLocator()->get('Equivalences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Equivalences);

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
