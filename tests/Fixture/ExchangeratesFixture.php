<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExchangeratesFixture
 */
class ExchangeratesFixture extends TestFixture
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
                'currency1' => 1,
                'currency2' => 1,
                'amount' => 1,
                'church' => 1,
                'created' => '2025-07-24 10:24:21',
                'modified' => '2025-07-24 10:24:21',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
