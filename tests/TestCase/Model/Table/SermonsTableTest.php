<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SermonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SermonsTable Test Case
 */
class SermonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SermonsTable
     */
    protected $Sermons;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Sermons',
        'app.Topics',
        'app.Churchs',
        'app.Comments',
        'app.Likes',
        'app.Medias',
        'app.Verses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sermons') ? [] : ['className' => SermonsTable::class];
        $this->Sermons = $this->getTableLocator()->get('Sermons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Sermons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SermonsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SermonsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
