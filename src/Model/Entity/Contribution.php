<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contribution Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string|null $donator
 * @property string|null $phone
 * @property float|null $amount
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Project $project
 */
class Contribution extends Entity
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
        'project_id' => true,
        'donator' => true,
        'phone' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'project' => true,
    ];
}
