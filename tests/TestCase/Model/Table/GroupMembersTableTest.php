<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GroupMembersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GroupMembersTable Test Case
 */
class GroupMembersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GroupMembersTable
     */
    protected $GroupMembers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.GroupMembers',
        'app.ChurchGroups',
        'app.Churchs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('GroupMembers') ? [] : ['className' => GroupMembersTable::class];
        $this->GroupMembers = $this->getTableLocator()->get('GroupMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->GroupMembers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GroupMembersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GroupMembersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
