<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChurchsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChurchsTable Test Case
 */
class ChurchsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChurchsTable
     */
    protected $Churchs;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Churchs',
        'app.Denominations',
        'app.Affecations',
        'app.Equipments',
        'app.Members',
        'app.Sermons',
        'app.Services',
        'app.Transactions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Churchs') ? [] : ['className' => ChurchsTable::class];
        $this->Churchs = $this->getTableLocator()->get('Churchs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Churchs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChurchsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ChurchsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
