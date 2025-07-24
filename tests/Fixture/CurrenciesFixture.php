<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CurrenciesFixture
 */
class CurrenciesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'short_name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-07-24 10:24:20',
                'modified' => '2025-07-24 10:24:20',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
