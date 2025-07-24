<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DenominationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DenominationsTable Test Case
 */
class DenominationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DenominationsTable
     */
    protected $Denominations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Denominations',
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
        $config = $this->getTableLocator()->exists('Denominations') ? [] : ['className' => DenominationsTable::class];
        $this->Denominations = $this->getTableLocator()->get('Denominations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Denominations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DenominationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
