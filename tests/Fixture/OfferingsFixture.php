<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OfferingsFixture
 */
class OfferingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'service_id' => 1,
                'service_date' => '2025-07-24',
                'offeringstype_id' => 1,
                'amount' => 1,
                'currency_id' => 'Lorem ipsum dolor sit amet',
                'church' => 1,
                'created' => '2025-07-24 10:24:23',
                'modified' => '2025-07-24 10:24:23',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
