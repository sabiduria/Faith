<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Church Entity
 *
 * @property int $id
 * @property string|null $reference
 * @property int $denomination_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $address
 * @property string|null $phone1
 * @property string|null $phone2
 * @property string|null $email
 * @property string|null $website
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Denomination $denomination
 * @property \App\Model\Entity\Affecation[] $affecations
 * @property \App\Model\Entity\Equipment[] $equipments
 * @property \App\Model\Entity\GroupMember[] $group_members
 * @property \App\Model\Entity\Member[] $members
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Sermon[] $sermons
 * @property \App\Model\Entity\Service[] $services
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Church extends Entity
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
        'reference' => true,
        'denomination_id' => true,
        'name' => true,
        'description' => true,
        'address' => true,
        'phone1' => true,
        'phone2' => true,
        'email' => true,
        'website' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'denomination' => true,
        'affecations' => true,
        'equipments' => true,
        'group_members' => true,
        'members' => true,
        'projects' => true,
        'sermons' => true,
        'services' => true,
        'transactions' => true,
    ];
}
