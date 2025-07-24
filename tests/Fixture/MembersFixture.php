<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersFixture
 */
class MembersFixture extends TestFixture
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
                'church_id' => 1,
                'role_id' => 1,
                'department_id' => 1,
                'membership_id' => 1,
                'reference' => 'Lorem ipsum d',
                'firstname' => 'Lorem ipsum dolor sit amet',
                'secondname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'gender' => 'L',
                'phone1' => 'Lorem ipsum d',
                'phone2' => 'Lorem ipsum d',
                'email' => 'Lorem ipsum dolor sit amet',
                'marital_status' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'birthdate' => '2025-07-24',
                'avatar' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'occupation' => 'Lorem ipsum dolor sit amet',
                'membership_date' => '2025-07-24',
                'baptism_status' => 1,
                'emergency_contact_name' => 'Lorem ipsum dolor sit amet',
                'emergency_contact_phone' => 'Lorem ipsum d',
                'member_status' => 1,
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
