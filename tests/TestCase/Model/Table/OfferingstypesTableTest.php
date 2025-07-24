<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfferingstypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfferingstypesTable Test Case
 */
class OfferingstypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OfferingstypesTable
     */
    protected $Offeringstypes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Offeringstypes',
        'app.Offerings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Offeringstypes') ? [] : ['className' => OfferingstypesTable::class];
        $this->Offeringstypes = $this->getTableLocator()->get('Offeringstypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Offeringstypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OfferingstypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
