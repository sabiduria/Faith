<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContributionsFixture
 */
class ContributionsFixture extends TestFixture
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
                'project_id' => 1,
                'donator' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum d',
                'amount' => 1,
                'created' => '2025-07-24 14:20:31',
                'modified' => '2025-07-24 14:20:31',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
