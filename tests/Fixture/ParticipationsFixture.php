<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParticipationsFixture
 */
class ParticipationsFixture extends TestFixture
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
                'participation_date' => '2025-07-24',
                'number_people' => 1,
                'male_people' => 1,
                'female_people' => 1,
                'children_people' => 1,
                'church' => 1,
                'created' => '2025-07-24 10:24:24',
                'modified' => '2025-07-24 10:24:24',
                'createdby' => 'Lorem ipsum dolor sit amet',
                'modifiedby' => 'Lorem ipsum dolor sit amet',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
