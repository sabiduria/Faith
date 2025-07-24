<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfferingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfferingsTable Test Case
 */
class OfferingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OfferingsTable
     */
    protected $Offerings;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Offerings',
        'app.Services',
        'app.Offeringstypes',
        'app.Currencies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Offerings') ? [] : ['className' => OfferingsTable::class];
        $this->Offerings = $this->getTableLocator()->get('Offerings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Offerings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OfferingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OfferingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
