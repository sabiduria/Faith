<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Like Entity
 *
 * @property int $id
 * @property int $sermon_id
 * @property int $member_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Sermon $sermon
 * @property \App\Model\Entity\Member $member
 */
class Like extends Entity
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
        'sermon_id' => true,
        'member_id' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'sermon' => true,
        'member' => true,
    ];
}
