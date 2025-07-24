<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property int $church_id
 * @property int $role_id
 * @property int $department_id
 * @property int $membership_id
 * @property string|null $reference
 * @property string|null $firstname
 * @property string|null $secondname
 * @property string|null $lastname
 * @property string|null $gender
 * @property string|null $phone1
 * @property string|null $phone2
 * @property string|null $email
 * @property string|null $marital_status
 * @property string|null $address
 * @property \Cake\I18n\Date|null $birthdate
 * @property string|null $avatar
 * @property string|null $occupation
 * @property \Cake\I18n\Date|null $membership_date
 * @property bool|null $baptism_status
 * @property string|null $emergency_contact_name
 * @property string|null $emergency_contact_phone
 * @property bool|null $member_status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Church $church
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Membership $membership
 * @property \App\Model\Entity\Attendance[] $attendances
 * @property \App\Model\Entity\Following[] $followings
 * @property \App\Model\Entity\Like[] $likes
 */
class Member extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'church_id' => true,
        'role_id' => true,
        'department_id' => true,
        'membership_id' => true,
        'reference' => true,
        'firstname' => true,
        'secondname' => true,
        'lastname' => true,
        'gender' => true,
        'phone1' => true,
        'phone2' => true,
        'email' => true,
        'marital_status' => true,
        'address' => true,
        'birthdate' => true,
        'avatar' => true,
        'occupation' => true,
        'membership_date' => true,
        'baptism_status' => true,
        'emergency_contact_name' => true,
        'emergency_contact_phone' => true,
        'member_status' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'church' => true,
        'role' => true,
        'department' => true,
        'membership' => true,
        'attendances' => true,
        'followings' => true,
        'likes' => true,
    ];
}
