<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AffecationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AffecationsTable Test Case
 */
class AffecationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AffecationsTable
     */
    protected $Affecations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Affecations',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Affecations') ? [] : ['className' => AffecationsTable::class];
        $this->Affecations = $this->getTableLocator()->get('Affecations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Affecations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AffecationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AffecationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
