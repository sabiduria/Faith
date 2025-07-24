<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChurchGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChurchGroupsTable Test Case
 */
class ChurchGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChurchGroupsTable
     */
    protected $ChurchGroups;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ChurchGroups',
        'app.GroupMembers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChurchGroups') ? [] : ['className' => ChurchGroupsTable::class];
        $this->ChurchGroups = $this->getTableLocator()->get('ChurchGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ChurchGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChurchGroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
