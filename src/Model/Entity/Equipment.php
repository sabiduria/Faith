<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipment Entity
 *
 * @property int $id
 * @property int $church_id
 * @property string|null $name
 * @property string|null $notes
 * @property float|null $price
 * @property string|null $equipment_status
 * @property \Cake\I18n\Date|null $acquisition_date
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Church $church
 * @property \App\Model\Entity\Maintenance[] $maintenances
 */
class Equipment extends Entity
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
        'name' => true,
        'notes' => true,
        'price' => true,
        'equipment_status' => true,
        'acquisition_date' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'church' => true,
        'maintenances' => true,
    ];
}
