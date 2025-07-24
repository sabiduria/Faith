<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participation Entity
 *
 * @property int $id
 * @property int $service_id
 * @property \Cake\I18n\Date|null $participation_date
 * @property float|null $number_people
 * @property float|null $male_people
 * @property float|null $female_people
 * @property float|null $children_people
 * @property int|null $church
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Service $service
 */
class Participation extends Entity
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
        'service_id' => true,
        'participation_date' => true,
        'number_people' => true,
        'male_people' => true,
        'female_people' => true,
        'children_people' => true,
        'church' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'service' => true,
    ];
}
